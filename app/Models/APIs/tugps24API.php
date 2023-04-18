<?php

namespace App\Models\APIs;

class tugps24API
{

    public function request()
    {
        $request = curl_init();

        $headers = array(
            'Content-Type:application/json',
        );

        curl_setopt($request, CURLOPT_URL, config('services.tugps24.url').config('services.tugps24.token'));

        curl_setopt($request, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($request));

        $info = curl_getinfo($request);

        curl_close($request);

        return $response;
    }
}
