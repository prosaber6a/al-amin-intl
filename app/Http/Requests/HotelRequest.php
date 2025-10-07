<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class HotelRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:70'],
            'location' => ['required', 'string', 'max:180'],
            'room_type' => ['required', 'string', 'max:70'],
            'room_capacity' => ['required', 'integer'],
            'price_per_night' => ['required', 'numeric']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Hotel name is required',
            'name.string' => 'Hotel name must be a string',
            'name.max' => 'Hotel name must not exceed 70 characters',
            'location.required' => 'Hotel location is required',
            'location.string' => 'Hotel location must be a string',
            'location.max' => 'Hotel location must not exceed 180 characters',
            'room_type.required' => 'Room type is required',
            'room_type.string' => 'Room type must be a string',
            'room_type.max' => 'Room type must not exceed 70 characters',
            'room_capacity.required' => 'Room capacity is required',
            'room_capacity.integer' => 'Room capacity must be an integer',
            'price_per_night.required' => 'Price per night is required',
            'price_per_night.numeric' => 'Price per night must be numeric',
        ];
    }
}
