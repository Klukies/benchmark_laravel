<?php

namespace App\Http\Controllers\Api;

use App\Country;

class CountriesController
{
    public function __invoke()
    {
        dd(Country::all());
        return response()->json(Country::all());
    }
}
