@extends('layouts.app')

@section('content')

<div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link btn btn-outline-primary" href="{{ route('cars.index') }}">Car
                    list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-primary" href="{{ route('cars.create') }}">Create a car</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-primary" href="{{ route('change') }}">Change admin</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="alert alert-primary" role="alert">
            <h3>Hello {{ Auth::user()->name }}, you are the admin today !</h3>
        </div>
        <div class="card-columns">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Cars in stock: </div>
                <div class="card-body">
                    <p class="card-text">You have {{ $all }} cars in stock</p>
                </div>
            </div>
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Total sum invested :</div>
                <div class="card-body">
                    <p class="card-text">Total sum invested in Eur: {{ $eur }}</p>
                </div>
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
                <th>Name </th>
                <th>Email</th>
                <th>Message</th>
                <th>Created at</th>
            </tr>
        </thead>
        @foreach ($contactMessages as $message)
        <tr>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->message }}</td>
            <td>{{ $message->created_at }}</td>

            <td>
                <form action="{{ route('contact.destroy', $message->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip"
                        title='Delete'> <i class="fa fa-trash"> </i>
                        Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$('.show_confirm').click(function(e) {
    if (!confirm('Are you sure you want to delete this?')) {
        e.preventDefault();
    }
});
</script>

@endsection