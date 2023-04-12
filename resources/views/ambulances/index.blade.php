@extends('adminlte::page')

@section('content')
<table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Plate</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 1;
            ?>
            @foreach ($ambulances as $index => $device)
            <tr>
                <th scope="row">{{$ambulance->id}}</th>
                <td>{{$ambulance->plate}}</td>
                <td>{{$ambulance->type}}</td>
                <td>{{$ambulance->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop