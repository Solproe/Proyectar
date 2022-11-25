<?php

use App\Http\Controllers\Ambulance\AmbulanceControl;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Mail\SupportController;
use Illuminate\Support\Facades\Mail;

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
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/password', function () {
    return view('dashboard');
})->name('password');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('ambulance', [AmbulanceControl::class, 'index'])->name('ambulance.index');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
