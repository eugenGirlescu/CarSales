@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ session()->get('success') }} </p>
</div>
@endif
<form class="text-center border border-light p-5" method="post" action="{{ route('change') }}">
    @csrf
    <p class="h4 mb-4">Change user role</p>
    <input type="text" id="email" name="email" class="form-control mb-4" placeholder="E-mail">
    <select id="role" name="role">
        <option value="admin">Admin</option>
        <option value="normal">Normal</option>
    </select>
    </div>
    <button class="btn btn-info btn-block my-4" type="submit">Change</button>
    <a href="{{ route('admin') }}" class="btn btn-info btn-block my-4">Back to admin page</a>
</form>

@endsection