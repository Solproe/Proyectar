@extends('adminlte::page')

@section('title', 'status')

@section('content')

    <form action="{{ route('admin.status.store') }}" method="post">
        @csrf
        <div>
            <label for="">Status Name</label>
            <input type="text" name="status">
            <button class="btn btn-outline-success" type="submit">Save</button>
        </div>
    </form>

@endsection