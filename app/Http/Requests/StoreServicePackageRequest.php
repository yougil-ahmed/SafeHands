<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicePackageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'price_per_hour' => 'nullable|numeric|min:0',
            'delivery_time' => 'integer|min:1',
            'revisions' => 'integer|min:0',
        ];
    }
}
