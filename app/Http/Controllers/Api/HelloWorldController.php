<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function __invoke()
    {
        return response()->json(['message' => 'Hello World!'], 200);
    }
}
