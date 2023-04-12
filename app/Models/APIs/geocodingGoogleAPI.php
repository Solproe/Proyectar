<?php

namespace App\Models\APIs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class geocodingGoogleAPI
{
    use HasFactory;

    public $API_TOKEN = 'AIzaSyAnqddMw77Up_4n-e4JPRx-eLgb-QvzNuw';

    public function getAddressGeocoding($address)
    {
        $ad = $address . ",valledupar,colombia";

        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($ad).'&key='.urlencode($this->API_TOKEN));

        $geo = json_decode($geo, true);

        if ($geo['status'] = 'OK') {

            $latitud = $geo['results'][0]['geometry']['location']['lat'];

            $longitud = $geo['results'][0]['geometry']['location']['lng'];
        }

        return [$latitud, $longitud];
    }

    public function getInverseGeoCoding(array $coordinate)
    {
        $geolocalization = str(str_replace(',', '.', $coordinate[0]) . ',' . str_replace(',', '.', $coordinate[1]));

        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.urlencode($geolocalization).'&key='.urlencode($this->API_TOKEN));

        $geo = json_decode($geo, true);

        

        return $geo['results'][0]['formatted_address'];
    }
}
