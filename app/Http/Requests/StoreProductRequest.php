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
            'title' => 'required',
            'image' => 'required',
            'type' => 'nullable',
            'vendor' => 'required',
            'handle' => 'nullable',
            'owner' => 'required',
            'compare_at_price' => 'nullable|numeric',
            'price' => 'required|numeric',
            'stock_status' => 'nullable',
            'quantity' => 'nullable|integer',
            'published_at' => 'required|date',
            'tags' => 'nullable',
            //'images' => 'json',
            'full_permalink' => 'required',
            'content' => 'required',
            'meta' => 'nullable',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }
}
