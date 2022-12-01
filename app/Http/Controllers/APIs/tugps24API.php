<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\APIs\geocodingGoogleAPI;
use App\Models\APIs\tugps24API as APIsTugps24API;

class tugps24API extends Controller
{

    public function getDataFromAPI()
    {
        $APIsTugps24API = new APIsTugps24API();

        $coordinates = $APIsTugps24API->request();

        $coordinates = $coordinates->TrackingSDT;

        $matriz =  array();

        $geoCodingGoogleAPI = new geocodingGoogleAPI();

        foreach ($coordinates as $data)
        {
            $address = $geoCodingGoogleAPI->getInverseGeoCoding([$data->Latitud, $data->Longitud]);

            $newData = ['Plate' => $data->Plate, 
                        'Address' => $address,
                        'Distance' => 0,
                        'Latitud' => $data->Latitud,
                        'Longitud' => $data->Longitud];

            $matriz [] = $newData;

            $newData = null;
        }

        return $matriz;
    }
}
