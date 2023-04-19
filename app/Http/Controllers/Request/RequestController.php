<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Models\Ambulances\Ambulances;
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

    /**
     * receive request to save and push messages
     */

    public function store(Request $request)
    {
        $requests = new Requests();

        $tuGPS24 = new tugps24API();

        $tuGPS24Ambulances = $tuGPS24->request();

        $geoCodingGoogleAPI = new geocodingGoogleAPI();

        $geoTo = $geoCodingGoogleAPI->getAddressGeocoding($request->to);

        if ($request->from == null && $request->transType == 'TAM')
        {
            $this->typeRequest = 'urgency';

            $validateDistance = new validateDistance();

            $nearestDevice = $validateDistance->nearestDevice($tuGPS24Ambulances, $geoTo, $this->typeRequest);

            $requests->id_ambulance = $nearestDevice[1];

            $request->

            dd($requests);
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
