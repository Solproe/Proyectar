<div>
    {!! Form::open(['route' => 'admin.ambulances.store', 'autocomplete' => 'off']) !!}
        <div class="form-row ml-4 mt-4">
            <div class="col">
                {!! Form::label('Plate', '') !!}
                {!! Form::text('plate', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Name Of Role',
                ]) !!}
            </div>
            <div class="col">
                {!! Form::label('Type', '') !!}
                {!! Form::text('type', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Name Of Role',
                ]) !!}
            </div>
            <div class="col">
                {!! Form::label('Status', '') !!}
                {!! Form::text('status', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Name Of Role',
                ]) !!}
            </div>
            <div class="col">
                {!! Form::label('Token', '') !!}
                {!! Form::text('device_token', null, [
                'class' => 'form-control',
                'placeholder' => 'Enter Name Of Role',
                ]) !!}
            </div>
            <div class="col align-self-end">
                {!! form::submit('Ambulances Create', ['class' => 'btn btn-outline-success mb-4 mr-4 align-self-end float-right']) !!}
            </div>
        </div>
    {!! form::close() !!}
</div>
