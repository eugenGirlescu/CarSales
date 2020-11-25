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
        <h3>Cars in stock: {{ $all }}</h3>
        <h3>Total sum invested in LEI: {{ $lei }} lei</h3>
    </div>

    @endsection