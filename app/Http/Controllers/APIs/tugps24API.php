<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Middleware\AmbulanceActive;
use App\Models\Ambulances\Ambulances;
use App\Models\APIs\geocodingGoogleAPI;
use App\Models\APIs\tugps24API as APIsTugps24API;
use PhpParser\Node\Expr\Cast\String_;

class tugps24API extends Controller
{

    public function index()
    {
        return view('api.index');
    }

    public function getDataFromAPI()
    {
        $APIsTugps24API = new APIsTugps24API();

        $coordinates = $APIsTugps24API->request();

        $matriz =  array();

        if (isset($coordinates->TrackingSDT) and $coordinates->TrackingSDT != null)
        {
            $coordinates = $coordinates->TrackingSDT;
    
            $geoCodingGoogleAPI = new geocodingGoogleAPI();
    
            foreach ($coordinates as $data)
            {
                $plate = substr($data->Plate, 0, 6);

                $ambulance = Ambulances::where('plate', $plate)->first();

                if ($ambulance != null && $ambulance->status->name == 'active')
                {
                    $address = $geoCodingGoogleAPI->getInverseGeoCoding([$data->Latitud, $data->Longitud]);
    
                    $newData = ['Plate' => $data->Plate, 
                                'Address' => $address,
                                'Distance' => 0,
                                'Latitud' => $data->Latitud,
                                'Longitud' => $data->Longitud,
                                'Status' => $ambulance->status->name];
        
                    $matriz [] = $newData;
                }

                $plate = null;

                $ambulance = null;
    
                $newData = null;
            }
        }

        return $matriz;
    }
}
