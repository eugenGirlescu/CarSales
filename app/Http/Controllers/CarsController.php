<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Image;

class CarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}