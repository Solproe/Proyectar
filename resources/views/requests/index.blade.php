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
                    <th style="align-items:center;">Detatils</th>
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
                    <td> {{$request->address}} </td>
                    <td>
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Identification</td>
                                    <td>docType</td>
                                    <td>Gender</td>
                                    <td>Date</td>
                                    <td>Hour</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $details = $request->details;
                                            $details = json_decode($details); ?>
                                    <td> {{$details->patientName}} </td>
                                    <td> {{$details->identification}} </td>
                                    <td> {{$details->docType}} </td>
                                    <td> {{$details->gender}} </td>
                                    <td> {{$details->date}} </td>
                                    <td> {{$details->hour}} </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td> {{$request->started}} </td>
                    <td> {{$request->finished}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
