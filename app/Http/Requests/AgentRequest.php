<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AgentRequest extends FormRequest
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
        $photo_rules = ['required', 'mimes:jpeg,jpg,png', 'max:2000'];

        if ($this->input('action') === 'update') {
            $photo_rules[0] = 'nullable';
        } 

        return [
            'id' => ['required', 'integer'],
            'action' => ['required', 'string', 'max:10'],
            'name' => ['required', 'string', 'max:70'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email', 'max:100'],
            'address' => ['required', 'string', 'max:200'],
            'status' => ['required', 'string', 'max:20'],
            'photo' => $photo_rules,
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
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not exceed 70 characters',
            'phone.required' => 'Phone is required',
            'phone.numeric' => 'Phone must be numeric',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email must not exceed 100 characters',
            'address.required' => 'Address is required',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address must not exceed 200 characters',
            'status.required' => 'Status is required',
            'status.string' => 'Status must be a string',
            'status.max' => 'Status must not exceed 20 characters',
            'photo.required' => 'Photo is required',
            'photo.mimes' => 'Photo must be a file of type: jpeg, jpg, png',
            'photo.max' => 'Photo must not exceed 2000 kilobytes'
        ];
    }
}
