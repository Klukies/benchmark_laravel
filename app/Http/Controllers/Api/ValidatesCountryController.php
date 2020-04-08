<?php

namespace App\Http\Controllers\Api;

use App\Country;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;

class ValidatesCountryController
{
    public function __invoke(CountryRequest $countryRequest)
    {
        $validated = $countryRequest->validated();
        $countries = Country::whereIn('name', $validated['countries'])->get();

        return response()->json(['countries' => $countries]);
    }
}
