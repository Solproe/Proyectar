<?php

namespace App\Http\Livewire;

use App\Http\Controllers\APIs\tugps24API;
use App\Models\APIs\geocodingGoogleAPI;
use App\Models\Data\validateDistance;
use Livewire\Component;

class Tugps24 extends Component
{
    public $data;

    public $address;

    public $matriz;

    public $min;

    public $type;

    public $document;

    public $typetransfer;

    public function render()
    {
        $database = app('firebase.database');
        
        $reponse = new tugps24API();

        $this->data = $reponse->getDataFromAPI();

        return view('livewire.tugps24');
    }

    public function distance()
    {
        $this->matriz = null;

        $geoCodingGoogleAPI = new geocodingGoogleAPI();

        $response = $geoCodingGoogleAPI->getAddressGeocoding($this->address);

        $validateDistance = new validateDistance();

        $this->matriz = array();

        $min = array();

        foreach ($this->data as $key => $data) {
            
            $distance = $validateDistance->getDistance([$data['Latitud'], $data['Longitud']], [$response[0], $response[1]]);

            $this->matriz[] = ['Plate' => $data['Plate'], 'Distance' => $distance];

            $min [] = $distance;
        }

        $data = null;

        foreach ($this->matriz as $data)
        {
            if ($data['Distance'] == min($min)){

                $this->min = $data;

                break;
            }
        }
    }
}
