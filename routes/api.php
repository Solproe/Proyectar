<?php

use App\Http\Controllers\APIs\PhoneRegister;
use App\Http\Controllers\APIs\tugps24API;
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

Route::post('registerPhone', [PhoneRegister::class, 'register'])->name('api.registerPhone');

Route::get('tugps24', [tugps24API::class, 'index'])->name('api.tugps24');