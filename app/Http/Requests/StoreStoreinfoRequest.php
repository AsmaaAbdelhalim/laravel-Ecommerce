<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreinfoRequest extends FormRequest
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
            'name' => 'required|string',
            'currency' => 'required|string',
            'time_zone' => 'required|string',
            'email' => 'required|email',
            'description' => 'required|string',
            'country' => 'required|string',
            'country_code' => 'required|string',
            'created_at' => 'required',
            'updated_at' => 'required',
        ];
    }
}
