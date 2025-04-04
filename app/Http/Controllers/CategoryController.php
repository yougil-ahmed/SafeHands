<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        // Handle image upload and store in the 'public/admin/categories' directory
        if ($request->hasFile('category_image')) {
            $data['category_image'] = $request->file('category_image')->store('admin/categories', 'public');
        }

        // Create category with validated data
        Category::create($data);

        return to_route('admin.categories.index')->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        // If a new image is uploaded, handle the file and delete the old one
        if ($request->hasFile('category_image')) {
            if ($category->category_image) {
                // Delete old category image from storage
                Storage::disk('public')->delete($category->category_image);
            }

            // Store the new category image
            $data['category_image'] = $request->file('category_image')->store('admin/categories', 'public');
        }

        // Update category with the new data
        $category->update($data);

        return to_route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        // Delete the category image if it exists
        if ($category->category_image) {
            Storage::disk('public')->delete($category->category_image);
        }

        // Delete the category from the database
        $category->delete();

        return back()->with('success', 'Category deleted successfully!');
    }
}
