<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\APIs\geocodingGoogleAPI;
use App\Models\APIs\tugps24API as APIsTugps24API;
use App\Models\Data\validateDistance;
use Location\Coordinate;
use Location\Distance\Haversine;
use Location\Distance\Vincenty;
use Location\Line;

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
            $direccion = 'carrera 6a #19-44, Valledupar, Colombia';

            $response = $geoCodingGoogleAPI->getAddressGeocoding($direccion);

            $address = $geoCodingGoogleAPI->getInverseGeoCoding([$data->Latitud, $data->Longitud]);

            $validateDistance = new validateDistance();

            $Distance = $validateDistance->getDistance([$data->Latitud, $data->Longitud], [$response[0], $response[1]]);

            $newData = ['Plate' => $data->Plate, 
                        'Address' => $address,
                        'Distance' => round($Distance / 1000, 3)];

            $matriz [] = $newData;

            $newData = null;
        }

        return $matriz;
    }
}
