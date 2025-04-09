<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServicePackageRequest;
use App\Models\PackageOption;
use App\Models\Service;
use App\Models\ServicePackage;
use Illuminate\Http\Request;

class ServicePackageController extends Controller
{
    /**
     * Show the form for creating packages for a service.
     */
    public function create(Service $service)
    {
        return view('admin.service-packages.create', compact('service'));
    }

    /**
     * Store multiple packages and their options.
     */
    public function store(Request $request, Service $service)
    {
        $request->validate([
            'packages' => 'required|array|size:3',
            'packages.*.name' => 'required|string|max:255',
            'packages.*.description' => 'nullable|string',
            'packages.*.price' => 'required|numeric|min:0',
            'packages.*.delivery_time' => 'nullable|integer|min:1',
            'packages.*.revisions' => 'nullable|integer|min:0',
            'options' => 'nullable|array',
            'options.*.name' => 'required_with:options|string|max:255',
            'options.*.values' => 'required_with:options|array|size:3',
            'options.*.values.*' => 'required_with:options|string|max:255'
        ]);

        // Create packages
        $packages = [];
        foreach ($request->packages as $packageData) {
            $packages[] = ServicePackage::create([
                'service_id' => $service->id,
                'name' => $packageData['name'],
                'description' => $packageData['description'],
                'price' => $packageData['price'],
                // 'delivery_time' => $packageData['delivery_time'],
                // 'revisions' => $packageData['revisions']
            ]);
        }

        // Create options if they exist
        if ($request->has('options')) {
            foreach ($request->options as $optionData) {
                $option = PackageOption::create([
                    'service_id' => $service->id,
                    'name' => $optionData['name']
                ]);

                // Create values for each package
                foreach ($packages as $index => $package) {
                    $package->optionValues()->create([
                        'option_id' => $option->id,
                        'value' => $optionData['values'][$index]
                    ]);
                }
            }
        }

        return redirect()->route('admin.services.edit', $service->id)
            ->with('success', 'Packages and options created successfully!');
    }
}