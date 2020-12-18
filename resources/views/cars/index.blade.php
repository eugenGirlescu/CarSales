@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card-header">
            <h1 class="card text-center">Ma&#351;ini &#238;n stoc</h1>
        </div>
        <div class="pull-right">
            @if(auth()->check() && Auth::user()->role == 'admin')
            <a class="btn btn-success mr-3" href="{{ route('cars.create') }}" title="Create car"> <i
                    class="fas fa-plus-circle"></i> Adaug&#259;</a>
            @endif
            <span class="font-weight-bold sort-font"> Sorteaz&#259; : </span>
            <select onChange="window.location.href = this.value">
                <option value="{{ URL::current() }}" selected="selected" class="sort-font">Select</option>
                <option value="{{ URL::current(). "?sort=price_asc" }}" class="sort-font">Pre&#355;: Cresc&#259;tor
                </option>
                <option value="{{ URL::current(). "?sort=price_desc" }}" class="sort-font">Pre&#355; : Descresc&#259;tor
                </option>
                <option value="{{ URL::current(). "?sort=newest" }}" class="sort-font">Ma&#351;ini noi</option>
            </select>
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
            <th>Locuri</th>
            <th>Combustibil</th>
            <th>An</th>
            <th>Culoare</th>
            <th>Cutie viteze</th>
            <th>Pre&#355;</th>
            <th>Moned&#259;</th>
        </tr>
    </thead>
    @if ($result->count() == 0)
    <tr>
        <td colspan="5">Nicio ma&#351;in&#259; &#238;n list&#259;.</td>
    </tr>
    @endif
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

        @if(auth()->check() && Auth::user()->role == 'admin')
        <td>
            <a href="{{ route('cars.edit', $res->id) }}" class="btn btn-primary"><i class="fa fa-pencil"
                    aria-hidden="true"> Editeaz&#259;</i></a>
        </td>
        @endif
        <td>
            <a href="{{ route('cars.show', $res->id) }}" class="btn btn-primary"><i class="fa fa-eye"
                    aria-hidden="true"> Vezi ma&#351;ina</i></a>
        </td>
        @if(auth()->check() && Auth::user()->role == 'admin')
        <td>
            <form action="{{ route('cars.destroy', $res->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip"
                    title='Delete'> <i class="fa fa-trash"> </i>
                    &#350;terge</button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</table>
@if(auth()->check() && Auth::user()->role == 'admin')
<a href="{{ route('admin') }}" class="btn btn-primary"><i class="fa fa-user" aria-hidden="true"> Pagina admin</i></a>
@endif
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$('.show_confirm').click(function(e) {
    if (!confirm('Esti sigur ca vrei sa stergi?')) {
        e.preventDefault();
    }
});
</script>
@endsection