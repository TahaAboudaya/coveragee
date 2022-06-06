@extends('layouts.app')

@section('content')
<style>
   .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    display: none;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background-color: #2196F3;
}

input:focus+.slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}
</style>
<div class="content">
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="mapform">
            <div class="row">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="service" name="service" id="service">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="name" name="name" id="name">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="phone" name="phone" id="phone">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                </div>
            </div>
            <label class="switch">
                <input type="checkbox">
                <div class="slider"></div>
            </label>

            <div id="map" style="height:400px; width: 800px;" class="my-3"></div>

            <script>
                let map;


                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {
                        center: {
                            lat: 32.885353,
                            lng: 13.180161
                        },
                        zoom: 8,
                        scrollwheel: true,
                    });
                    // this for when change marker with click 
                    const uluru = {
                        lat: 32.885353,
                        lng: 13.180161
                    };
                    let marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                        draggable: true
                    });
                    //this for record lan and let in text filed

                    google.maps.event.addListener(marker, 'position_changed',
                        function() {
                            let lat = marker.position.lat()
                            let lng = marker.position.lng()
                            $('#lat').val(lat)
                            $('#lng').val(lng)
                        })
                    //this for change marker in map
                    google.maps.event.addListener(map, 'click',
                        function(event) {
                            pos = event.latLng
                            marker.setPosition(pos)
                        })
                }
                
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>


</div>



@endsection