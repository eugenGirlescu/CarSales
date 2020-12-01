@extends('layouts.app')

@section('content')

<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a class="direction-link" target="_blank"
                    href="//maps.google.com/maps?f=d&amp;daddr=44.353656,24.158268&amp;hl=en"><strong> Click here for
                        navigation instructions</strong></a>
                <div class="mapContainer">
                    <div id="map"></div>
                </div>
            </div>
            <br />
            <div class="col-md-6">
                <h3>Contact us:</h3><br>
                <form class="form" id="contact" action="{{ route('contact') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input name="name" class="form-control" id="name" placeholder="Name" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input name="email" class="form-control" id="email" placeholder="Email" type="email">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" class="form-control" id="message" maxlength="5000" rows="5"
                                placeholder="Your message here ..."></textarea>
                        </div>
                        <div class="form-group col-md-12 mb0">
                            <div class="actions">
                                <input type="submit" class="primary-btn pull-right" name="send" value="Send">
                            </div>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ session()->get('success') }} </p>
                        </div>
                        @endif
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