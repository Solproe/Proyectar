<?php

namespace App\Http\Controllers\Ambulance;

use App\Http\Controllers\Controller;
use App\Models\Ambulances\Ambulances;
use App\Models\Status\status;
use App\Services\FirebaseRealTimeDatabase;
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
        $firebase = new FirebaseService(config('services.tugps24.db.solproe-solproyectar'));

        $RTdatabase = new FirebaseRealTimeDatabase($firebase
                ->getFirebase(), config('services.tugps24.db.solproe-solproyectar'));

        $RTdatabase->getRequest('requests');

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

    public function updateTokens()
    {
        $firebase = new FirebaseService(config('services.tugps24.db.solproe-solproyectar'));

        $RTdatabase = new FirebaseRealTimeDatabase($firebase->getFirebase(), 'https://solproyectar-6f96d-default-rtdb.firebaseio.com/');

        $RTdatabase->updateTokens();

        return redirect()->route('admin.ambulances.index');
    }
}
