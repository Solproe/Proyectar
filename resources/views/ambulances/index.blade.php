@extends('adminlte::page')

@section('content')
<table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Plate</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 1;
            ?>
            @foreach ($ambulances as $ambulance)
            <tr>
                <th scope="row">{{$ambulance->id}}</th>
                <td>{{$ambulance->plate}}</td>
                <td>{{$ambulance->type}}</td>
                <td>{{$ambulance->status->name}}</td>
                <td>
                    <form action="{{ route('admin.ambulances.edit', $ambulance->id) }}">
                        @csrf
                        <button class="btn btn-outline-warning">edit</button>
                    </form>
                    <form action="{{ route('admin.ambulances.destroy', $ambulance->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop