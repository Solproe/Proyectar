<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AmbulanceTransfer extends Component
{

    public $ambulance;

    public $origin;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ambulance, $origin)
    {
        $this->ambulance = $ambulance;

        $this->origin = $origin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ambulance-transfer');
    }
}
