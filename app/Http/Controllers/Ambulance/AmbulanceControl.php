<?php

namespace App\Http\Controllers\Ambulance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmbulanceControl extends Controller
{
    public function index()
    {
        return view('ambulances.index');
    }
}
