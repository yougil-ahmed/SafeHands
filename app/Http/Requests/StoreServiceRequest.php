<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // 'price' => 'numeric|min:0',
            'location' => 'string|max:255',
            'category_id' => 'required|exists:categories,id',
            'service_image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'packages' => 'array|min:1',
            'packages.*.name' => 'required|string|max:255',
            'packages.*.description' => 'nullable|string',
            'packages.*.price' => 'nullable|numeric|min:0',
            'packages.*.price_per_hour' => 'nullable|numeric|min:0',
            'packages.*.delivery_time' => 'nullable|integer|min:1',
            'packages.*.revisions' => 'nullable|integer|min:0',
        ];
    }
}
