<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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
