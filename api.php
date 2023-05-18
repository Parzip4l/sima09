<?php

namespace App\Http\Controllers;

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

Route::middleware('auth:api')->get('/warga', function (Request $request) {
    return $request->warga();
});

Route::post('/login', [WargaController::class, 'login']);
Route::post('/logout', [WargaController::class, 'logout'])->middleware('auth:api');