<?php

namespace App\Http\Controllers;

use App\Models\OptionValue;
use App\Models\PackageOption;
use App\Models\Service;
use App\Models\ServicePackage;
use Illuminate\Http\Request;

class PackageOptionController extends Controller
{
    /**
     * Display a listing of the options for a service.
     */
    public function index($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $options = PackageOption::where('service_id', $serviceId)
            ->with(['values' => function ($query) {
                $query->with('package');
            }])
            ->orderBy('sort_order')
            ->get();

        $packages = ServicePackage::where('service_id', $serviceId)->get();

        return view('admin.package-options.index', compact('service', 'options', 'packages'));
    }

    /**
     * Show the form for creating a new option.
     */
    public function create($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $packages = ServicePackage::where('service_id', $serviceId)->get();

        return view('admin.package-options.create', compact('service', 'packages'));
    }

    /**
     * Store a newly created option with its values.
     */
    public function store(Request $request, $serviceId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'values' => 'required|array',
            'values.*' => 'required|string|max:255'
        ]);

        // Create the option
        $option = PackageOption::create([
            'service_id' => $serviceId,
            'name' => $validated['name'],
            'sort_order' => PackageOption::where('service_id', $serviceId)->max('sort_order') + 1
        ]);

        // Create values for each package
        foreach ($validated['values'] as $packageId => $value) {
            OptionValue::create([
                'option_id' => $option->id,
                'package_id' => $packageId,
                'value' => $value
            ]);
        }

        return redirect()->route('admin.services.options.index', $serviceId)
            ->with('success', 'Option added successfully');
    }

    /**
     * Show the form for editing the option.
     */
    public function edit($serviceId, $optionId)
    {
        $service = Service::findOrFail($serviceId);
        $option = PackageOption::with('values')->findOrFail($optionId);
        $packages = ServicePackage::where('service_id', $serviceId)->get();

        // Prepare values in package_id => value format for easy form filling
        $values = [];
        foreach ($option->values as $value) {
            $values[$value->package_id] = $value->value;
        }

        return view('admin.package-options.edit', compact('service', 'option', 'packages', 'values'));
    }

    /**
     * Update the option and its values.
     */
    public function update(Request $request, $serviceId, $optionId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'values' => 'required|array',
            'values.*' => 'required|string|max:255'
        ]);

        // Update the option
        $option = PackageOption::findOrFail($optionId);
        $option->update(['name' => $validated['name']]);

        // Update or create values for each package
        foreach ($validated['values'] as $packageId => $value) {
            OptionValue::updateOrCreate(
                [
                    'option_id' => $option->id,
                    'package_id' => $packageId
                ],
                ['value' => $value]
            );
        }

        return redirect()->route('admin.services.options.index', $serviceId)
            ->with('success', 'Option updated successfully');
    }

    /**
     * Remove the option and its values.
     */
    public function destroy($serviceId, $optionId)
    {
        $option = PackageOption::findOrFail($optionId);
        $option->values()->delete();
        $option->delete();

        return redirect()->route('admin.services.options.index', $serviceId)
            ->with('success', 'Option deleted successfully');
    }

    /**
     * Update the sort order of options.
     */
    public function sort(Request $request, $serviceId)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'exists:package_options,id'
        ]);

        foreach ($request->order as $index => $optionId) {
            PackageOption::where('id', $optionId)
                ->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
