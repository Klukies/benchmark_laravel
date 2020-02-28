<?php

namespace App\Http\Controllers\Api;

class FibonacciController
{

    public function __invoke()
    {
        $x = 0;
        $y = 1;

        $fibonacciNumbers = [];

        for ($i = 0; $i < 1000; $i++) {
            $z = $x + $y;
            $x = $y;
            $y = $z;
            array_push($fibonacciNumbers, $z);
        }

        return response()->json(['fibonacciNumbers' => $fibonacciNumbers]);
    }
}
