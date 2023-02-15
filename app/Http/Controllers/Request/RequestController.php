<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index() {

        return view('requests.index');
    }

    public function create(Request $request) {

        return view('requests.create');
    }
}
