<?php

use App\Http\Controllers\ParkirController;
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

Route::post('/hitung-biaya', [ParkirController::class, 'hitungBiaya']);
Route::get('/biaya-parkir', [ParkirController::class, 'getBiayaParkir']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
