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
                <input type="text">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="col">
                <label><i class="text-danger">*</i>Document type:</label>
            </div>
            <div class="col">
                <select>
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
            <div>
                <input type="text">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="col">
                <label>Identification:</label>
            </div>
            <div class="col">
                <input type="text" placeholder="Enter identification">
            </div>
        </div>
        <div class="col">
            <div class="col">
                <label>Companions:</label>
            </div>
            <div class="col">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio1">Yes</label>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2">Not</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="col">
                <label>Age:</label>
            </div>
            <div class="col">
                <input type="text">
            </div>
        </div>
        <div class="col">
            <div class="col">
                <label>Current Date:</label>
            </div>
            <div class="col">
                <input type="date" id="start" name="trip-start" value="2018-07-22">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="col">
                <label>Diagnosis:</label>
                <div>
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="col">
                <label>Transfer Time:</label>
            </div>
            <div class="col">
                <input type="time">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 border border-success rounded">
            <div class="col">
                <label>Nearest Ambulance: </label>
            </div>
            <div class="col">
                {{$ambulance}}
            </div>
        </div>
        <div class="col" style="left: 10%;">
            <button class="btn btn-outline-primary" type="submit" id="send">Ask</button>
        </div>
    </div>
    <style>
        .row {
            margin: 1.5%;
        }
    </style>

    <script>
        
    </script>
</div>