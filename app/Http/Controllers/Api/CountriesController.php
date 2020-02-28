<?php

namespace App\Http\Controllers\Api;

use App\Country;

class CountriesController
{
    public function __invoke()
    {
        return response()->json(Country::all());
    }
}
