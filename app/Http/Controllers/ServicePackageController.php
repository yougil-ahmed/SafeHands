<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServicePackageRequest;
use App\Models\Service;
use App\Models\ServicePackage;
use Illuminate\Http\Request;

class ServicePackageController extends Controller
{
    public function create(Service $service)
    {
        return view('admin.service-packages.create', compact('service'));
    }

    public function store(Request $request, Service $service)
    {
        $data = $request->validate([
            'packages' => 'required|array',
            'packages.*.name' => 'required|string|max:255',
            'packages.*.description' => 'nullable|string',
            'packages.*.price' => 'required|numeric|min:0',
            'packages.*.delivery_time' => 'nullable|integer|min:1',
            'packages.*.revisions' => 'nullable|integer|min:0',
        ]);

        foreach ($data['packages'] as $package) {
            $package['service_id'] = $service->id;
            ServicePackage::create($package);
        }

        return to_route('admin.services.show', $service->id)->with('success', 'Packages created successfully!');
    }
}
