@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 class="display-3">Add a car</h2>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <legend>
                        <label for="model" class="col-form-label">Model :</label>
                        <input type="text" class="form-control" id="model" name="model">
                    </legend>
                </div>

                <div class="form-group ">
                    <legend>
                        <label for="seats" class="col-form-label">Seats :</label>
                    </legend>
                    <select name="seats" id="seats">
                        <option value="2">2</option>
                        <option value="4" selected="selected">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>

                <div class="form-group ">
                    <legend>
                        <label for="fuel" class="col-form-label">Fuel :</label>
                    </legend>
                    <select name="fuel" id="fuel">
                        <option value="benzine+gpl">benzine+gpl</option>
                        <option value="gpl" selected="selected">diesel</option>
                        <option value="diesel">gpl</option>
                        <option value="diesel+gpl">diesel+gpl</option>
                        <option value="benzine">benzine</option>
                    </select>
                </div>

                <div class="form-group ">
                    <legend>
                        <label for="year" class="col-form-label">Year :</label>
                    </legend>
                    <input type="text" name="year" id="year">
                </div>

                <div class="form-group">
                    <legend>
                        <label for="color" class="col-form-label">Color :</label>
                    </legend>
                    <input type="text" class="form-control" id="color" name="color">
                </div>

                <div class="form-group ">
                    <legend>
                        <label for="gearbox" class="col-form-label">Gearbox :</label>
                    </legend>
                    <select name="gearbox" id="gearbox">
                        <option value="manual">manual</option>
                        <option value="automatic" selected="selected">automatic</option>
                        <option value="semiautomatic">semiautomatic</option>
                    </select>
                </div>

                <div class="form-group ">
                    <legend>
                        <label for="price" class="col-form-label">Price :</label>
                    </legend>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="form-group ">
                    <legend>
                        <label for="coinType" class="col-form-label">CoinType :</label>
                    </legend>
                    <select name="coinType" id="coinType">
                        <option value="EUR">EUR</option>
                        <option value="LEI" selected="selected">LEI</option>
                        <option value="USD">USD</option>
                    </select>
                </div>

                <div class="form-group ">
                    <legend>
                        <label for="image" class="col-form-label">Upload images :</label>
                    </legend>
                    <input type="file" class="form-control" name="images[]" multiple />
                </div>


                <hr style="height:2px;border-width:0;color:gray;background-color:gray">

                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <button type="submit" class="btn btn-primary">Add car</button>
                    <a class="btn btn-primary" href="{{ route('cars.index') }}"> Back to list</a>
                    <a class="btn btn-primary" href="{{ route('admin') }}"> Back to admin page</a>
                </div>
        </div>
        </form>
        @endsection