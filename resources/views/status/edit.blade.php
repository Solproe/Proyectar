@extends('adminlte::page')

@section('title', 'status')

@section('content')

    <form action="{{ route('admin.status.update', $status->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="">Status Name</label>
            <input type="text" name="status" placeholder="{{ $status->name }}">
            <button class="btn btn-outline-success" type="submit">Save</button>
        </div>
    </form>

@endsection