<?php

namespace App\Http\Controllers\APIs\requestapi;

use App\Http\Controllers\Controller;
use App\Models\Ambulances\Ambulances;
use App\Models\Requests\Requests;
use App\Models\Status\status;
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

    public function update(Request $request)
    {
        $ambulance = Ambulances::where('plate', $request->plate)->first();
        $requests = Requests::where('id_ambulance', $ambulance->id)->first();
        $status = status::where('name', $request->status)->first();

        if ($request->status == 'accepted')
        {
            $requests->update(['id_status' => $status->id]);
            $ambulance->update(['id_status' => 8]);
        }

        $data = [
            'response' => "ok"
        ];

        $data = json_encode($data);

        return $data;
    }
}
