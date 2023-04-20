<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Models\APIs\geocodingGoogleAPI;
use App\Models\APIs\tugps24API;
use App\Models\Data\validateDistance;
use App\Models\Requests\Requests;
use App\Models\Status\status;
use Illuminate\Http\Request;

/**
 * @method static \Illuminate\Routing\RouteRegistrar middleware(array|string|null $middleware)
 */

class RequestController extends Controller
{

    public $typeRequest;

    public $details = [
        'patientName' => null,
        'identification' => null,
        'docType' => null,
        'gender' => null,
        'date' => null,
        'hour' => null,
        'from' => null,
        'to' => null,
    ];

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

        $status = status::select('id')->where('name', 'sent')->first();

        $geoTo = $geoCodingGoogleAPI->getAddressGeocoding($request->to);

        $validateDistance = new validateDistance();

        if ($request->from == null && $request->transType == 'TAM')
        {
            $this->typeRequest = ':Urgency';

            $nearestDevice = $validateDistance->nearestDevice($tuGPS24Ambulances, $geoTo, $request->transType);

            $requests->id_ambulance = $nearestDevice->id;

            $requests->id_status = $status->id;

            $requests->type = $nearestDevice->type . $this->typeRequest;

            $requests->id_user = auth()->user()->id;

            $requests->address = $request->to;

            $this->details = [
                'patientName' => null,
                'identification' => null,
                'docType' => null,
                'gender' => null,
                'date' => null,
                'hour' => null,
                'from' => null,
                'to' =>$geoTo,
            ];

            $this->details = json_encode($this->details);

            $requests->details = $this->details;

            $requests->save();

            return redirect()->route('admin.requests.index');
        }
        elseif ($request->from != null && $request->transType == 'TAM')
        {
            $this->typeRequest = ':Normal';

            $geoFrom = $geoCodingGoogleAPI->getAddressGeocoding($request->from);

            $nearestDevice = $validateDistance->nearestDevice($tuGPS24Ambulances, $geoFrom, $request->transType);

            $requests->id_ambulance = $nearestDevice->id;

            $requests->id_status = $status->id;

            $requests->type = $nearestDevice->type . $this->typeRequest;

            $requests->id_user = auth()->user()->id;

            $requests->address = $request->from;

            $this->details = [
                'patientName' => $request->patientName,
                'identification' => $request->identification,
                'docType' => $request->docType,
                'gender' => $request->gender,
                'date' => $request->date,
                'hour' => $request->hour,
                'from' => $geoFrom,
                'to' => $geoTo,
            ];

            $this->details = json_encode($this->details);

            $requests->details = $this->details;

            $requests->save();

            return redirect()->route('admin.requests.index');
        }
        elseif ($request->from != null && $request->transType == 'TAB')
        {
            $this->typeRequest = ':Normal';

            $geoFrom = $geoCodingGoogleAPI->getAddressGeocoding($request->from);

            $nearestDevice = $validateDistance->nearestDevice($tuGPS24Ambulances, $geoFrom, $request->transType);

            $requests->id_ambulance = $nearestDevice->id;

            $requests->id_status = $status->id;

            $requests->type = $nearestDevice->type . $this->typeRequest;

            $requests->id_user = auth()->user()->id;

            $requests->address = $request->from;

            $this->details = [
                'patientName' => $request->patientName,
                'identification' => $request->identification,
                'docType' => $request->docType,
                'gender' => $request->gender,
                'date' => $request->date,
                'hour' => $request->hour,
                'from' => $geoFrom,
                'to' => $geoTo,
            ];

            $this->details = json_encode($this->details);

            $requests->details = $this->details;

            $requests->save();

            return redirect()->route('admin.requests.index');
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
