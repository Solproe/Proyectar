<?php


use App\Http\Controllers\APIs\requestapi\RequestController;
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

Route::post('request', [RequestController::class, 'update'])->name('api.v1.request.update');

Route::post('update', [RequestController::class, 'update'])->name('api.v1.ambulance.update');
