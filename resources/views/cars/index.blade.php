@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card-header">
            <h1 class="card text-center">Cars on sale</h1>
        </div>
        <div class="pull-right">
            @if(Auth::user()->role == 'admin')
            <a class="btn btn-success" href="{{ route('cars.create') }}" title="Create car"> <i
                    class="fas fa-plus-circle"></i> Add car</a>
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

        @if(Auth::user()->role == 'admin')
        <td>
            <a href="{{ route('cars.edit', $res->id) }}" class="btn btn-primary"><i class="fa fa-pencil"
                    aria-hidden="true"> Edit</i></a>
        </td>
        @endif
        <td>
            <a href="{{ route('cars.show', $res->id) }}" class="btn btn-primary"><i class="fa fa-eye"
                    aria-hidden="true"> Show</i></a>
        </td>
        @if(Auth::user()->role == 'admin')
        <td>
            <form action="{{ route('cars.destroy', $res->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip"
                    title='Delete'> <i class="fa fa-trash"> </i>
                    Delete</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</table>

@if(Auth::user()->role == 'admin')
<a href="{{ route('admin') }}" class="btn btn-primary"><i class="fa fa-user" aria-hidden="true"> Admin page</i></a>
@endif

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$('.show_confirm').click(function(e) {
    if (!confirm('Are you sure you want to delete this?')) {
        e.preventDefault();
    }
});
</script>
@endsection