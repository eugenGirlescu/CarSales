@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card-header">
            <h1 class="card text-center">Cars on sale</h1>
        </div>
        <div class="pull-right">
            @if(Auth::user()->role == '0')
            <a class="btn btn-success" href="{{ route('cars.create') }}" title="Create car"> <i
                    class="fas fa-plus-circle"></i>Add car</a>
            @endif
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ session()->get('success') }} </p>
</div>
@endif

<table class="table table-striped table-hover table-dark table-responsive-lg ">
    <thead>
        <tr>
            <th>Model</th>
            <th>Seats</th>
            <th>Fuel</th>
            <th>Year</th>
            <th>Color</th>
            <th>Gearbox</th>
            <th>Price</th>
            <th>Coin-type</th>
        </tr>
    </thead>
    @foreach ($result as $res)
    <tr>
        <td>{{ $res->model }}</td>
        <td>{{ $res->seats }}</td>
        <td>{{ $res->fuel }}</td>
        <td>{{ $res->year }}</td>
        <td>{{ $res->color }}</td>
        <td>{{ $res->gearbox }}</td>
        <td>{{ $res->price }}</td>
        <td>{{ $res->coinType }}</td>

        @if(Auth::user()->role == '0')
        <td>
            <a href="{{ route('cars.edit', $res->id) }}" class="btn btn-primary">Edit</a>
        </td>
        @endif
        <td>
            <a href="{{ route('cars.show', $res->id) }}" class="btn btn-primary">Show</a>
        </td>
        @if(Auth::user()->role == '0')
        <td>
            <form action="{{ route('cars.destroy', $res->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</table>
@if(Auth::user()->role == '0')
<a href="{{ route('admin') }}" class="btn btn-primary">Back to admin page</a>
@endif

@endsection