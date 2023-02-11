<div>
    @if($data != null)
    <header>
        <div class="row" style="padding: 20px 10px 20px 10px;">
            <div class="col">
                <form action="" method="post">
                    <label>Address</label>
                    <input type="text" name="address">
                    <select name="typetransfer" style="margin-left: 4%;">
                        <option value="emergencia">Emergencia</option>
                        <option value="traslado">Traslado</option>
                    </select>
                    <button type="submit" onclick="send();" class="btn btn-outline-success" style="margin-left: 4%;">
                        Search
                    </button>
                </form>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" id="icon-notification">
                    <i class="far fa-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="list-requests">
                    <span class="dropdown-header" id="header-notifications">0 Notifications</span>
                </div>
            </div>
        </div>
    </header>
    @if($matriz != null and $typetransfer == "traslado")
    <x-ambulance-transfer ambulance="{{$min['Plate']}}"></x-ambulance-transfer>
    @endif
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

    <script src="{{ asset('js/requestsNotification.js') }}"></script>
</div>