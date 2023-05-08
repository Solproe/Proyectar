<div>
    @csrf
    @if($data != null)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Plate</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Distance / Km</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 1;
            ?>
            @foreach ($data as $index => $device)
            <tr>
                <th scope="row">{{$num}}</th>
                <td>{{$device['Plate']}}</td>
                <td>{{$device['Address']}}</td>
                <td>{{$device['Status']}}</td>
                @if($matriz == null)
                <td align="center">{{$device['Distance']}}</td>
                @else
                @foreach($matriz as $key => $distance)
                @if($distance['Plate'] == $device['Plate'])
                <td align="center">{{str_replace('.', ',',$distance['Distance'])}}</td>
                @endif
                @endforeach
                @endif
            </tr>
            <?php
            $num += 1;
            ?>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
