@extends('layouts.app')

@section('content')
<style>
#map {
    width: 200%;
    height: 400px;
    background-color: grey;
}

.mapContainer {
    width: 50%;
    position: relative;
}

.mapContainer a.direction-link {
    position: absolute;
    top: 5px;
    right: 0px;
    z-index: 100010;
    color: #FFF;
    text-decoration: none;
    font-size: 15px;
    font-weight: bold;
    line-height: 25px;
    padding: 8px 20px 8px 50px;
    background: #0094de;
    background-position: left center;
    background-repeat: no-repeat;
}

a.direction-link:hover {
    text-decoration: none;
    background: #F3AA13;
    color: red;
    background-position: left center;
    background-repeat: no-repeat;
}

.contact-us {
    padding: 70px 0px;
    background: #E8E8E8;
}
</style>

<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="direction-link" target="_blank"
                    href="//maps.google.com/maps?f=d&amp;daddr=44.353656,24.158268&amp;hl=en"><strong> Click aici pentru
                        a obtine indicatiile de navigare</strong></a>
                <div class="mapContainer">
                    <div id="map"></div>
                </div>
            </div>
            <br />
            <div class="col-md-6">
                <h3>Formular contact:</h3><br>
                <form class="form" id="contact" action="" method="POST">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input name="name" class="form-control" id="name" placeholder="Nume" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="email" class="form-control" id="email" placeholder="Email" type="email">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" class="form-control" id="message" maxlength="5000" rows="5"
                                placeholder="Mesajul tau ..."></textarea>
                        </div>
                        <div class="form-group col-md-12 mb0">
                            <div class="actions">
                                <input type="submit" class="primary-btn pull-right" name="send" value="Trimite">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDodelx0L_N8QNL0900_R0H1X3pm4HVIEg&callback">
    </script>

    <script>
    var myCenter = new google.maps.LatLng(44.353656, 24.158268);

    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map"), mapProp);

        var marker = new google.maps.Marker({
            position: myCenter,
        });

        marker.setMap(map);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</section>

@endsection