<?php

namespace App\Http\Controllers\Api;

use App\Country;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;

class ValidatesCountryController
{
    public function __invoke(CountryRequest $countryRequest)
    {
        $validated = $countryRequest->validate();
        $countries = Country::whereIn('name', $validated['countries']);

        return response()->json($countries);
    }
}
