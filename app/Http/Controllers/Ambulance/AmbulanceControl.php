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

    public function status()
    {
        return view('ambulances.status');
    }

    public function create(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
