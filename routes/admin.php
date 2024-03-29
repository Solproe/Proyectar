<?php

use App\Http\Controllers\Ambulance\AmbulancesController;
use App\Http\Controllers\APIs\tugps24API;
use App\Http\Controllers\Request\RequestController;
use App\Http\Controllers\Status\StatusController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->group(function ()
{
    Route::get('update/token', [AmbulancesController::class, 'updateTokens'])->name('admin.ambulances.token');

    Route::resource('ambulances', AmbulancesController::class)->names('admin.ambulances');

    Route::resource('requests', RequestController::class)->names('admin.requests');

    Route::resource('status', StatusController::class)->names('admin.status');

    Route::get('tugps24', [tugps24API::class, 'index'])->name('admin.tugps24.index');

    Route::get('tugps24Status', [tugps24API::class, 'status'])->name('admin.tugps24.status');

});
