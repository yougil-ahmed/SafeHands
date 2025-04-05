<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\PackageOption;
use App\Models\ServicePackage;
use App\Models\ServicePackageOptionValue;
use Illuminate\Http\Request;

class ServicePackageOptionValueController extends Controller
{
    public function create(Service $service)
    {
        $service->load('packages'); // Load the 3 packages
        $options = PackageOption::all();

        return view('services.packages.options.create', compact('service', 'options'));
    }

    public function store(Request $request, Service $service)
    {
        $request->validate([
            'options' => 'required|array',
            'options.*.name' => 'required|string|max:255',
            'options.*.values' => 'required|array',
            'options.*.values.*' => 'required|integer|min:0',
        ]);

        foreach ($request->options as $optionData) {
            // Save or get existing option
            $option = PackageOption::firstOrCreate([
                'name' => $optionData['name']
            ]);

            // Save values per package
            foreach ($optionData['values'] as $packageId => $value) {
                ServicePackageOptionValue::create([
                    'service_package_id' => $packageId,
                    'package_option_id' => $option->id,
                    'value' => $value,
                ]);
            }
        }

        return redirect()->route('services.show', $service)->with('success', 'Options added successfully!');
    }
}
