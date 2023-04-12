@extends('adminlte::page')

@section('content')
<div>
    {!! Form::model($ambulance,[
                    'route' => ['admin.ambulances.update', $ambulance->id],
                    'method' => 'PUT',
                    'autocomplete' => 'off'
                    ]) !!}
        <div class="form-row ml-4 mt-4">
            <div class="col">
                {!! Form::label('Plate', '') !!}
                {!! Form::text('plate', null, [
                'class' => 'form-control',
                'placeholder' => '{{ $ambulance->plate }}',
                ]) !!}
            </div>
            <div class="col">
                {!! Form::label('Type', '') !!}
                {!! Form::text('type', null, [
                'class' => 'form-control',
                'placeholder' => '{{ $ambulance->type }}',
                ]) !!}
            </div>
            <div class="col">
                {!! Form::label('Status', '') !!}
                {!! Form::select('status', $status, null, [
                'class' => 'form-control',
                'placeholder' => '',
                ]) !!}
            </div>
            <div class="col">
                {!! Form::label('Token', '') !!}
                {!! Form::text('device_token', null, [
                'class' => 'form-control',
                'placeholder' => '{{ $ambulance->device_token }}',
                ]) !!}
            </div>
            <div class="col align-self-end">
                {!! form::submit('Ambulances Edit', ['class' => 'btn btn-outline-success mb-4 mr-4 align-self-end float-right']) !!}
            </div>
        </div>
    {!! form::close() !!}
</div>
    
@endsection