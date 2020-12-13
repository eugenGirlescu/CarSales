@extends('layouts.app')

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v9.0&appId=390082662137773&autoLogAppEvents=1"
    nonce="rkc2Fh8k"></script>
<div class="card text-center">
    <div class="card-header bg-dark text-white">
        <h1> {{ $cars->model }}</h1>
    </div>
    <div class="card-body bg-light text-dark">
        <h5 class="card-title text-primary">Pre&#355;: {{ $cars->price }} {{ $cars->coinType }}</h5>
        <p class="card-text text-primary">Combustibil: {{ $cars->fuel }}</p>
        <p class="card-text text-primary">Locuri: {{ $cars->seats }}</p>
        <p class="card-text text-primary">An: {{ $cars->year }}</p>
        <p class="card-text text-light bg-dark">Cutie: {{ $cars->gearbox }}</p>
        <a href="{{ route('cars.index') }}" class="btn btn-primary">&#206;napoi la list&#259;</a>
        <a href="{{ route('welcome') }}" class="btn btn-primary">&#206;napoi la prima pagin&#259;</a><br><br>
        <div class="fb-share-button" data-href="{{ URL::to('cars/'. $cars->id) }}" data-layout="button_count"
            data-size="large"><a target="_blank"
                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.parc-autobals.ro%2Fcars%2Fid&amp;src=sdkpreparse"
                class="fb-xfbml-parse-ignore">Distribuie</a></div>
        <div class="card-footer text-muted">
            Ultimul update: {{ $cars->updated_at }}
        </div>
    </div>
    <div class="container">
        <div class="row imagetiles">
            @foreach($image as $res)
            @foreach($res as $key => $result)
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                <a href="{{ asset('images/' . $result->file_name)}}" target="_blank">
                    <img src="{{ asset('images/' . $result->file_name)}}" alt="{{ $result->file_name }}"
                        class="d-block w-100 card-img-top" style="width:100%">
                </a>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>

    @endsection