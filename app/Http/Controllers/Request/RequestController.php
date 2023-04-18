<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Models\APIs\geocodingGoogleAPI;
use App\Models\APIs\tugps24API;
use App\Models\Data\validateDistance;
use App\Models\Requests\Requests;
use Illuminate\Http\Request;

/**
 * @method static \Illuminate\Routing\RouteRegistrar middleware(array|string|null $middleware)
 */

class RequestController extends Controller
{

    public $typeRequest;

    public function index() {

        $requests = Requests::all();

        return view('requests.index', compact('requests'));
    }

    public function create() {

        return view('requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'transType' =>  'required',
            'to'        =>  'required',
        ]);

        $requests = new Requests();

        $tuGPS24 = new tugps24API();

        $response = $tuGPS24->request();

        $geoCodingGoogleAPI = new geocodingGoogleAPI();

        $geoTo = $geoCodingGoogleAPI->getAddressGeocoding($request->to);

        if ($request->from == null && $request->transType == 'TAM')
        {
            $this->typeRequest = 'urgency';

            dd($response);

        }
        else
        {
            $this->typeRequest = 'normal';

            $geoFrom = $geoCodingGoogleAPI->getAddressGeocoding($request->from);

        }

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
