<?php

namespace App\Models\APIs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugps24API
{
    public $API_URL = 'https://core.optimus.tugps24.com/erp/optimusapi/list?token=';

    public $API_TOKEN = '616d6270726f796563746172~416d6250726f79656374617231323321';

    public function request()
    {
        $request = curl_init();

        $headers = array(
            'Content-Type:application/json',
        );

        curl_setopt($request, CURLOPT_URL, $this->API_URL.$this->API_TOKEN);

        curl_setopt($request, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($request));

        $info = curl_getinfo($request);

        curl_close($request);

        return $response;
    }
}
