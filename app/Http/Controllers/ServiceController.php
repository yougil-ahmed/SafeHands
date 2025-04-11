<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.services.create' , compact('categories'));
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        if ($request->hasFile('service_image')) {
            $data['service_image'] = $request->file('service_image')->store('services', 'public');
        }

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('services', 'public');
            }
            $data['images'] = $images;
        }

        $service = Service::create($data);

        // Redirect to packages creation with service ID
        return to_route('admin.service-packages.create', ['service' => $service->id])
            ->with('success', 'Service created successfully! Now create your packages.');
    }

    public function show(Service $service)
    {
        // dd($service);
        // $service = Service::with('packages.optionValues')->findOrFail($service);
        return view('admin.services.show' , compact('service'));
    }

    public function edit(Service $service)
    {
        if (Auth::id() !== $service->user_id) {
            abort(403);
        }

        $categories = Category::all();

        return view('admin.services.edit', compact('service' , 'categories'));
    }

    public function update(StoreServiceRequest $request, Service $service)
    {
        if (Auth::id() !== $service->user_id) {
            abort(403);
        }

        $data = $request->validated();
        $data['status'] = 'pending';

        if ($request->hasFile('images')) {
            if ($service->images) {
                foreach ($service->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('admin.services', 'public');
            }
            $data['images'] = $images;
        }

        $service->update($data);

        return to_route('admin.services.index')->with('success', 'Service updated and sent for re-approval.');
    }

    public function destroy(Service $service)
    {
        if (Auth::id() !== $service->user_id) {
            abort(403);
        }

        if ($service->images) {
            foreach ($service->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $service->delete();
        return back()->with('success', 'Service deleted.');
    }

    public function adminIndex()
    {
        $services = Service::where('status', 'pending')->paginate(10);
        return view('admin.services.index', compact('admin.services'));
    }

    public function approve(Service $service)
    {
        $service->update(['status' => 'approved']);

        Notification::create([
            'user_id' => $service->user_id, // replace with actual relation
            'type' => 'approved',
            'message' => 'Your service "' . $service->title . '" has been approved.',
        ]);

        return back()->with('success', 'Service approved.');
    }

    public function reject(Request $request, Service $service)
    {
        $request->validate([
            'reason' => 'required|string|max:1000',
        ]);

        $service->update(['status' => 'rejected']);

        Notification::create([
            'user_id' => $service->user_id,
            'type' => 'rejected',
            'message' => 'Your service "' . $service->title . '" was rejected. Reason: ' . $request->reason,
        ]);

        return back()->with('error', 'Service rejected.');
    }

    public function sendMessage(Request $request, Service $service)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Logic to send message to the service owner
        // For example, you can use a notification system or email

        return back()->with('success', 'Message sent to the service owner.');
    }
}
