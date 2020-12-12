@extends('layouts.app')

@section('content')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/ro_RO/sdk.js#xfbml=1&version=v9.0&appId=295396058474636&autoLogAppEvents=1"
    nonce="IX54gxi2"></script>
<div class="container py-5">
    <div class="jumbotron text-white jumbotron-image shadow">
        <h2 class="mb-4">
            Parc Auto Bals
        </h2>
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Parc auto</a>
    </div>
    <div class="fb-share-button" data-href="https://parc-autobals.ro" data-layout="button_count" data-size="small"><a
            target="_blank"
            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparc-autobals.ro%2F&amp;src=sdkpreparse"
            class="fb-xfbml-parse-ignore">Distribuie</a></div>
</div>
<div class="card-header">
    <h1 class="card text-left">Cele mai recente :</h1>
</div>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @if(!empty($images))
            @foreach($images as $img)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/' . $img->file_name)}}">
                    <div class="card-body">
                        <p class="card-text">{{ $img->model }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('cars.show', $img->id) }}" class="btn btn-primary"><i
                                        class="fa fa-info-circle" aria-hidden="true"> Details</i></a>
                            </div>
                            <small class="text-muted">Last update: {{ $img->updated_at }} </small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="card-header">
                <h1 class="card text-left">No car</h1>
            </div>
            @endif
        </div>
    </div>
</div>
</main>
</body>

</html>

@endsection