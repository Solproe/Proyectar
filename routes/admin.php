<?php

use App\Http\Controllers\Ambulance\AmbulancesController;
use App\Http\Controllers\Request\RequestController;
use Illuminate\Support\Facades\Route;

Route::resource('ambulances', AmbulancesController::class)->names('ambulances');

Route::resource('requests', RequestController::class)->names('requests');
