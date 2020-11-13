@extends('layouts.app')

@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner d-block w-25 p-3">
        @foreach($image as $res)
        @foreach($res as $key => $result)
        <div class=" carousel-item {{$key == 0 ? 'active' : '' }}">
            <img class="d-block w-100" src="{{ asset('images/' . $result->file_name)}}" class="d-block w-100"
                alt="{{ $result->model }}">
        </div>
        @endforeach
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>




@endsection