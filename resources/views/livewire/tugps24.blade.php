<div>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <button wire:click="showAmbulances()" type="submit" class="btn btn-outline-success">
        data
    </button>
    @if($data != null)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Plate</th>
                <th scope="col">Latitud</th>
                <th scope="col">Longitud</th>
                <th scope="col">Distance</th>
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
                <td>{{$device['Latitude']}}</td>
                <td>{{$device['Length']}}</td>
                <td>{{$device['Distance']}}</td>
            </tr>
            <?php
            $num += 1;
            ?>
            @endforeach
        </tbody>
    </table>
    @endif

    <div id="map">
        data
    </div>
</div>