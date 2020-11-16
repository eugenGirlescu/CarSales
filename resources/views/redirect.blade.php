@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Acces denied</h1>
                </div>

                <div class="card-body">
                    <h1>You're not an admin ! </h1>
                    <a href="{{ route('welcome') }}" class="btn btn-primary">Go to first page</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection