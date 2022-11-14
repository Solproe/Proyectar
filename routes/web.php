<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/forgot-password', function () {
    return view('auth.password.reset');
})->middleware('auth')->name('password.request');
 */

Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


