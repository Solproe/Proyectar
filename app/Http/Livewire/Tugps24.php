<?php

namespace App\Http\Livewire;

use App\Http\Controllers\APIs\tugps24API;
use Livewire\Component;

class Tugps24 extends Component
{
    public $data;

    public $API_TOKEN = '616d6270726f796563746172~416d6250726f79656374617231323321';

    public $API_URL = 'https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyA1APsLdkwFAPDXCR3TCLu-ZKITLuftxlo';

    public function render()
    {
        $reponse = new tugps24API();

        $this->data = $reponse->getDataFromAPI();

        return view('livewire.tugps24');
    }
}
