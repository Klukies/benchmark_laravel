<?php

namespace App\Http\Controllers\Api;

class HelloWorldController
{
    public function __invoke()
    {
        return response()->json(['message' => 'Hello World!'], 200);
    }
}
