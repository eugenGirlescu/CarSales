@extends('layouts.app')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Parc Auto Bals</h1>
        <p class="lead text-muted">Something short and leading about the collection contents, the creator,
            etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        <p>
            <a href="#" class="btn btn-primary my-2">Car list</a>
            <a href="#" class="btn btn-secondary my-2">Register</a>
        </p>
    </div>
</section>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            @foreach($cars as $car)
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top"
                        data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                        alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{ $car->model }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-muted">Last update: {{ $car->updated_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
    </div>
</footer>
</body>

</html>

@endsection