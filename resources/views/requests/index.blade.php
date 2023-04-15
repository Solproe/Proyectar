@extends('adminlte::page')

@section('content')
    <div>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Plate</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>operator</th>
                    <th>Address</th>
                    <th>Detatils</th>
                    <th>Started</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                <tr>
                    <td scope="row"> {{$request->ambulances->plate}} </td>
                    <td> {{$request->type}} </td>
                    <td> {{$request->status->name}} </td>
                    <td> {{$request->users->name}} </td>
                    <td> {{$request->details}} </td>
                    <td> {{$request->started}} </td>
                    <td> {{$request->finished}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection