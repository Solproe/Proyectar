<?php

namespace App\Models\APIs;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class geocodingGoogleAPI
{
    use HasFactory;

    public function getAddressGeocoding($address): array
    {
        $ad = $address . ",valledupar,colombia";

        $geo = file_get_contents(config('services.googleGeocoding.url').urlencode($ad).'&key='.urlencode(config('services.googleGeocoding.token')));

        $geo = json_decode($geo, true);

        if ($geo['status'] = 'OK') {

            $latitud = $geo['results'][0]['geometry']['location']['lat'];

            $longitud = $geo['results'][0]['geometry']['location']['lng'];
        }

        return [floatval($latitud), floatval($longitud)];
    }

    public function getInverseGeoCoding(array $coordinate)
    {
        $geolocalization = str(str_replace(',', '.', $coordinate[0]) . ',' . str_replace(',', '.', $coordinate[1]));

        $geo = file_get_contents(config('services.googleGeocoding.url').urlencode($geolocalization).'&key='.urlencode(config('services.googleGeocoding.token')));

        $geo = json_decode($geo, true);



        return $geo['results'][0]['formatted_address'];
    }
}
