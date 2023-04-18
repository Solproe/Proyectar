<?php

namespace App\Http\Controllers\APIs\requestapi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'data' => $request->data . 'eres un pro!',
        ];

        $data = json_encode($data);

        return $data;
    }
}
