<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
            'action' => ['required', 'string', 'max:10'],
            'name' => 'required|string|max:255',
            'type' => 'required|in:hajj,umrah',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'hotel_id' => 'required|exists:hotels,id',
            'flight_id' => 'required|exists:flights,id',
        ];
    }

    /**
     * Return custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The package name is required.',
            'name.string' => 'The package name must be a string.',
            'name.max' => 'The package name may not be greater than 255 characters.',
            'type.required' => 'The package type is required.',
            'type.in' => 'The selected package type is invalid. Choose either hajj or umrah.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'duration.required' => 'The duration is required.',
            'duration.integer' => 'The duration must be an integer.',
            'duration.min' => 'The duration must be at least 1 day.',
            'hotel_id.required' => 'The hotel selection is required.',
            'hotel_id.exists' => 'The selected hotel is invalid.',
            'flight_id.required' => 'The flight selection is required.',
            'flight_id.exists' => 'The selected flight is invalid.',
        ];
    }
}
