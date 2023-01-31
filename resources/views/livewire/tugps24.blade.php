<div>
    @if($data != null)
    <header>
        <div class="row" style="padding: 20px 10px 20px 10px;">
            <div class="col">
                <label>Address</label>
                <input type="text" wire:model="address">
                <select wire:model="typetransfer" style="margin-left: 4%;">
                    <option value="emergencia">Emergencia</option>
                    <option value="traslado">Traslado</option>
                </select>
                <button wire:click="distance()" type="submit" onclick="send();" class="btn btn-outline-success" style="margin-left: 4%;">
                    Search
                </button>
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

    <script src="{{ asset('js/sendNotification.js') }}"></script>
</div>