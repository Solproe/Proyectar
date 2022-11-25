<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\APIs\tugps24API as APIsTugps24API;
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

        foreach ($coordinates as $data)
        {   
            $line = new Line(
                new Coordinate(floatval($data->Latitud), floatval($data->Longitud)),
                new Coordinate(10.471181, -73.241624)
            );

            $length = $line->getLength(new Haversine());

            $newData = ['Plate' => $data->Plate, 
                        'Latitude' => $data->Latitud, 
                        'Length' => $data->Longitud, 
                        'Distance' => $length];

            $matriz [] = $newData;

            $newData = null;
        }

        /* dd($matriz); */

        return $matriz;
    }

    public function showAmbulances()
    {
        dd('data');
    }
}
