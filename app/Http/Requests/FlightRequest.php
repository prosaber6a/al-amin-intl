<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;


class FlightRequest extends FormRequest
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
            'flight_no' => ['required', 'string', 'max:10', 'unique:flights,flight_no,' . $this->id],
            'airline' => ['required', 'string', 'max:50'],
            'from' => ['required', 'string', 'max:100'],
            'to' => ['required', 'string', 'max:100'],
            'departure' => ['required', Rule::date()->format('Y-m-d H:i')],
            'arrival' => ['required', Rule::date()->format('Y-m-d H:i')],
            'price' => ['required', 'numeric']
        ];
    }

    public function messages(): array
    {
        return [
            'flight_no.required' => 'Flight number is required',
            'flight_no.unique' => 'Flight number must be unique',
            'airline.required' => 'Airline is required',
            'from.required' => 'Departure is required',
            'to.required' => 'Arrival is required',
            'departure.required' => 'Departure date and time is required',
            'departure.date_format' => 'Departure date and time must be in the format Y-m-d H:i',
            'arrival.required' => 'Arrival date and time is required',
            'arrival.date_format' => 'Arrival date and time must be in the format Y-m-d H:i',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a numeric value',
        ];
    }
}
