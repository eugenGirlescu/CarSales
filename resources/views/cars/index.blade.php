@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Cars on sale</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('cars.create') }}" title="Create a product"> <i
                    class="fas fa-plus-circle"></i>Add car</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ session()->get('success') }} </p>
</div>
@endif

<table class="table table-striped table-dark table-responsive-lg">
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
        <td>
            <a href="{{ route('cars.edit', $res->id) }}" class="btn btn-primary">Edit</a>
        </td>
        <td>
            <a href="{{ route('cars.show', $res->id) }}" class="btn btn-primary">Show</a>
        </td>
        <td>
            <form action="{{ route('cars.destroy', $res->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


@endsection