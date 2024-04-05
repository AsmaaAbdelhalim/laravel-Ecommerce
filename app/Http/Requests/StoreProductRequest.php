<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'image' => 'required|string',
            'type' => 'nullable|string',
            'vendor' => 'required|string',
            'handle' => 'nullable|string',
            'owner' => 'required|string',
            'price' => 'required|numeric',
            'compare_at_price' => 'nullable|numeric',
            'stock_status' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'published_at' => 'required|date',
            'tags' => 'nullable|string',
            'full_permalink' => 'required|string',
            'content' => 'required|string',
            'meta' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'image_id' => 'nullable|exists:images,id',
        ];
    }
}
