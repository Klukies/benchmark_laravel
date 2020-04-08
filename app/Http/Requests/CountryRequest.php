<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function rules(): array
    {
        return ['countries' => 'required|array'];
    }

    public function messages()
    {
        return [
            'countries.required' => 'Countries are required',
            'countries.array' => 'Countries has to be an array',
        ];
    }
}
