<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'email' => 'required|email|unique:customers,email',
            'accepts_marketing' => 'boolean|nullable',
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'orders_count' => 'integer|required',
            'state' => 'string|nullable',
            'total_spent' => 'numeric|required',
            'last_order_id' => 'integer|nullable',
            'verified_email' => 'boolean|nullable',
            'phone' => 'string|nullable',
            'last_order_name' => 'string|nullable',
            'currency' => 'string|required',
            'addresses' => 'nullable|json',
            'default_address' => 'nullable|json',
            'registered_at' => 'date|required',
            'gender' => 'string|nullable',
        ];
    }
}
