<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        // Fetch all reviews
        $reviews = Review::with('user', 'service')->paginate(10);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create(Service $service)
    {
        // Show form to create a new review for a specific service
        return view('admin.reviews.create', compact('service'));
    }

    public function store(Request $request)
    {
        // Validate and store the new review
        $data = $request->validated();

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('services', 'public');
            }
            $data['images'] = $images;
        }

        Review::create($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review created successfully!');
    }

    public function show(Review $review)
    {
        // Show review details
        return view('admin.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        // Show form to edit the review
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        // Validate and update the review
        $data = $request->validated();

        if ($request->hasFile('images')) {
            if ($review->images) {
                // Delete old images from storage
                foreach ($review->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            // Store the new images
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('services', 'public');
            }
            $data['images'] = $images;
        }

        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        // Delete the review and its images
        if ($review->images) {
            foreach ($review->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully!');
    }
}
