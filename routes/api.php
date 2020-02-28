<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FibonacciController;
use App\Http\Controllers\Api\CountriesController;
use App\Http\Controllers\Api\HelloWorldController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route that returns a Hello World! response */
Route::get('/', HelloWorldController::class);

/* Route that returns fibonacci numbers from 0-100 */
Route::get('/fibonacci', FibonacciController::class);

/* Route that returns a listing of all countries in the world */
Route::get('/countries', CountriesController::class);
