<?php

namespace App\Http\Livewire\Ambulances;

use App\Models\Ambulances\Ambulances;
use App\Models\Status\status;
use Livewire\Component;

class AmbulanceCreate extends Component
{
    public $ambulances;

    public $status;

    public $types;

    public function render()
    {
        $this->ambulances = Ambulances::all();

        return view('livewire.ambulances.ambulance-create');
    }
}
