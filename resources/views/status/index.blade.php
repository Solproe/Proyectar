@extends('adminlte::page')

@section('content')
<table>
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">name</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($status as $stat)
        <tr>
            <th scope="row">{{ $stat->id }}</th>
            <td>{{ $stat->name }} <span>
                <form action="{{ route('admin.status.edit', $stat->id) }}" method="PUT">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-outline-warning">edit</button>
                </form>
                
                <form action="{{ route('admin.status.destroy', $stat->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger">edit</button>
                </form>
            </span></td>
        </tr>
    @endforeach
    </tbody>

</table>
@stop