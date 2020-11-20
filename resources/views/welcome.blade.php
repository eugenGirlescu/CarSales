@extends('layouts.app')

@section('content')
<style>
.card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
}

.jumbotron-image {
    background-position: center;
    background-repeat: no-repeat;
    background-size: 900px;
    width: 900px;
}
</style>

<div class="container py-5">
    <div class="jumbotron text-white jumbotron-image shadow"
        style="background-image: url(https://scontent-otp1-1.xx.fbcdn.net/v/t1.0-9/45146860_2467866583229459_8630876758591143936_o.jpg?_nc_cat=106&ccb=2&_nc_sid=09cbfe&_nc_ohc=_JMxqUnhxoAAX9WP_zQ&_nc_ht=scontent-otp1-1.xx&oh=b580b5029b89609806ba836422ae7769&oe=5FDA03CF);">
        <h2 class="mb-4">
            Parc Auto Bals
        </h2>
        <p class="mb-4">
            Hey, check this out.
        </p>
        <a href="https://bootstrapious.com/snippets" class="btn btn-primary">More Bootstrap Snippets</a>
    </div>
</div>
<div class="card-header">
    <h1 class="card text-left">Recent :</h1>
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
                <h1 class="card text-left">No cars available</h1>
            </div>
            @endif
        </div>
    </div>
</div>
</main>
</body>

</html>

@endsection