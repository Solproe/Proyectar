<?php

namespace App\Http\Livewire;

use App\Http\Controllers\APIs\tugps24API;
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

    public $fate;

    public $fateGeo;

    public $originGeo;

    public function render()
    {
        $reponse = new tugps24API();

        $this->data = $reponse->getDataFromAPI();

        return view('livewire.tugps24');
    }
}
