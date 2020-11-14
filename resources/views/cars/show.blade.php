@extends('layouts.app')

@section('content')

<div class="card text-center">
    <div class="card-header bg-dark text-white">
        <h1> {{ $cars->model }}</h1>
    </div>
    <div class="card-body bg-light text-dark">
        <h5 class="card-title">Price: {{ $cars->price }} {{ $cars->coinType }}</h5>
        <p class="card-text">Fuel: {{ $cars->fuel }}</p>
        <p class="card-text">Seats: {{ $cars->seats }}</p>
        <p class="card-text">Year: {{ $cars->year }}</p>
        <p class="card-text">Gearbox: {{ $cars->gearbox }}</p>
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Back to list</a>
    </div>
    <div class="card-footer text-muted">
        Last update: {{ $cars->updated_at }}
    </div>
</div>
<div class="container">
    <div class="row imagetiles">
        @foreach($image as $res)
        @foreach($res as $key => $result)
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <a href="{{ asset('images/' . $result->file_name)}}" target="_blank">
                <img src="{{ asset('images/' . $result->file_name)}}" class="d-block w-100" style="width:100%">
            </a>
        </div>
        @endforeach
        @endforeach
    </div>
</div>


@endsection