<?php

use App\Http\Controllers\Ambulance\AmbulanceControl;
use App\Http\Controllers\Request\RequestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::post('request/create', [RequestController::class, 'create'])->name('request.create');
