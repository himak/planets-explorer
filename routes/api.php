<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Planets

Route::apiResource('planets', \App\Http\Controllers\Api\PlanetController::class)->only('index')->names('api.planets');

Route::get('/planets/terrain/{terrain}', [\App\Http\Controllers\Api\PlanetsByTerrainController::class, '__invoke'])->name('api.planets.terrain');
