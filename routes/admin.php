<?php

use App\Http\Controllers\Ambulance\AmbulancesController;
use App\Http\Controllers\APIs\tugps24API;
use App\Http\Controllers\Request\RequestController;
use App\Http\Controllers\Status\StatusController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::resource('ambulances', AmbulancesController::class)->names('admin.ambulances');

    Route::resource('requests', RequestController::class)->names('requests');

    Route::resource('status', StatusController::class)->names('admin.status');

    Route::get('tugps24', [tugps24API::class, 'index'])->name('admin.tugps24');

});