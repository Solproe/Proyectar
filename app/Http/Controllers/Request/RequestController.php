<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Models\Requests\Requests;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index() {

        $requests = Requests::all();

        return view('requests.index', compact('requests'));
    }

    public function create() {

        return view('requests.create');
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    public function status($id)
    {
        return view('api.tuGPS24Status');
    }
}
