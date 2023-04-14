<?php

namespace App\Http\Controllers\Ambulance;

use App\Http\Controllers\Controller;
use App\Models\Ambulances\Ambulances;
use App\Models\Status\status;
use App\Models\User;
use App\Services\FirebaseService;
use Illuminate\Http\Request;

class AmbulancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firebase = new FirebaseService();

        
        
        $ambulances = Ambulances::all();

        return view('ambulances.index', compact('ambulances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = status::orderBy('id')->pluck('name', 'id');

        return view('ambulances.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'plate' => 'required|unique:ambulances',
            'type' => 'required',
            'id_status' => 'required',
            'device_token' => 'required|unique:ambulances',
        ]);

        $ambulances = new Ambulances();
        $ambulances->fill($request->all());
        if ($ambulances->save()) {
            return redirect()->route('admin.ambulances.index');
        }
        else {
            return redirect()->route('admin.ambulances.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ambulance = Ambulances::where('id', $id)->first();

        $status = status::orderBy('id')->pluck('name', 'id');

        return view('ambulances.edit', compact('status', 'ambulance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ambulance = Ambulances::where('id', $id)->update([
            'plate' => $request->plate,
            'type'  => $request->type,
            'id_status' => $request->status,
            'device_token'  => $request->device_token,
        ]);

        return redirect()->route('admin.ambulances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambulance = Ambulances::where('id', $id)->first()->delete();

        return redirect()->route('admin.ambulances.index');
    }
}
