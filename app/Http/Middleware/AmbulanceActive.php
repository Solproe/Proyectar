<?php

namespace App\Http\Middleware;

use App\Models\Ambulances\Ambulances;
use Closure;
use Illuminate\Http\Request;

class AmbulanceActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    
    public function handle($request, Closure $next)
    {
        dd($request);

        
        /*
        if ($ambulance != null && $ambulance->status->name == 'active') 
        {
            return $plate;
        }
        else
        {
            return $plate;
        }
        */

        return;
    }
}
