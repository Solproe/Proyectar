<div>
    @if($data != null)
    <header>
        <div class="row" style="padding: 20px 10px 20px 10px;">
            <div class="col">
                <label>Address</label>
                <input type="text" wire:model="address" autocomplete="TRUE">
                <select wire:model="typetransfer" style="margin-left: 4%;">
                    <option value="emergencia">Emergencia</option>
                    <option value="traslado">Traslado</option>
                </select>
                <button wire:click="distance()" class="btn btn-outline-success" style="margin-left: 4%;">
                    Search
                </button>
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
    <div>
        <div class="row">
            <div class="col">
                <div class="col">
                    <label>Patient Name:</label>
                </div>
                <div class="col">
                    <input type="text" id="patientName">
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <label>Origin:</label>
                </div>
                <div class="col">
                    <input type="text" placeholder="{{$address}}" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col">
                    <label><i class="text-danger">*</i>Document type:</label>
                </div>
                <div class="col">
                    <select id="documentType">
                        <option value="">Document Type</option>
                        <option value="CC">CC - CITIZENSHIP CARD</option>
                        <option value="CE">CE - FOREIGNER ID</option>
                        <option value="PA">PA - PASSPORT</option>
                        <option value="NUIP">NUIP - UNIQUE PERSONAL IDENTIFICATION NUMBER</option>
                        <option value="PE">PE - SPECIAL RESIDENCE PERMIT</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <label>Fate:</label>
                </div>
                <div class="col">
                    <input type="text" id="fate" wire:model="fate">
                </div>
                <div class="col">
                    <span>
                        <button wire:click="validatefate" class="btn btn-outline-info" id="validateButton">
                            Validate
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col">
                    <label>Identification:</label>
                </div>
                <div class="col">
                    <input type="text" placeholder="Enter identification" id="identification">
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <label>Companions:</label>
                </div>
                <div class="col">
                    <select class="form-select" id="check">
                        <option selected>select</option>
                        <option value="yes">Yes</option>
                        <option value="not">Not</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col">
                    <label>Birthday:</label>
                </div>
                <div class="col">
                    <input type="date" id="birthday" name="trip-start" value="2018-07-22">
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <label>Transfer Date:</label>
                </div>
                <div class="col">
                    <input type="date" id="transferDate" name="trip-start" value="2018-07-22">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col">
                    <label>Diagnosis:</label>
                    <div>
                        <textarea name="" id="diagnosis" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <label>Transfer Time:</label>
                </div>
                <div class="col">
                    <input type="time" id="transferTime">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 border border-success rounded">
                <div class="col">
                    <label>Nearest Ambulance: </label>
                </div>
                <div class="col">
                    {{$min['Plate']}}
                </div>
            </div>
            <div class="col" style="left: 10%;">
                <button class="btn btn-outline-primary" id="sendTransfer">Ask</button>
            </div>
        </div>
        <style>
            #validateButton {
                margin-top: 3%;
            }

            .row {
                margin: 1.5%;
            }
        </style>
        @if (isset($originGeo[0]))
        <script>
            var button = document.getElementById("sendTransfer");
            button.addEventListener("click", function() {
                var plate = "{{ $min['Plate'] }}";
                var fromLat = "{{ $originGeo[0] }}";
                var fromLng = "{{ $originGeo[1] }}";
                var toLat = "{{ $fateGeo[0] }}";
                var toLng = "{{ $fateGeo[1] }}";
                var device = 'fD2QDILlRB6KzSGIUClE8h:APA91bGzIA3iuPr_Gt3KpeX3Bpu9YJ3FWvActkWpBNcK4a1_3f8rawMPpGUJrw-OLOeJPHJMBB-VPY6IRtsF7fwzu5rl8HwUbVHrCKvWDGQ6xNhGTpux62AYGkFyeb2quYUj_g8U7vqW';
                transfer(plate, device, fromLat, fromLng, toLat, toLng, "{{$address}}");
            });
        </script>
        @endif
    </div>
    @endif
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
                <td>Status...</td>
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
    <script src="{{ asset('js/sendNotification.js') }}"></script>
</div>