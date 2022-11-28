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
                    <th scope="col">Address</th>
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

    <script async
    src="https://maps.googleapis.com/maps/api/js?key=616d6270726f796563746172%7E416d6250726f79656374617231323321&callback=initMap&v=weekly">
    </script>

    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8,
            });
        }
    </script>
    <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</div>