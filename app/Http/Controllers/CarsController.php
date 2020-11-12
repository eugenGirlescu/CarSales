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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Car::with('images')->get();

        return view('cars.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'price'=> 'required',
            'file_name.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $destionationPath = public_path('/images');
        $images = [];

        $car = new Car();
        $car->model = $request->model;
        $car->seats = $request->seats;
        $car->fuel = $request->fuel;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->gearbox = $request->gearbox;
        $car->price = $request->price;
        $car->coinType = $request->coinType;
    
        $car->save();
     
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move($destionationPath, $fileName);
                $images[] = $fileName;
            }
        }

        foreach ($images as $imag) {
            $image = new Image();
            $image->car_id = $car->id;
            $image->file_name = $imag;
            $image->save();
        }

        return redirect()->route('cars.index')->with('success', 'Car saved !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Car::findOrFail($id);
        
        return view('cars.edit', compact('res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'price'=> 'required',
            'file_name.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $destionationPath = public_path('/images');
        $images = [];

        $car = Car::find($id);
        $car->model = $request->model;
        $car->seats = $request->seats;
        $car->fuel = $request->fuel;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->gearbox = $request->gearbox;
        $car->price = $request->price;
        $car->coinType = $request->coinType;
    
        $car->update();

        if ($files = $request->file('images')) {
            $car->images->each(function ($image) {
                $destionationPath = public_path('/images');
                if (file_exists($destionationPath . '/' . $image->file_name)) {
                    $path = $destionationPath . '/' . $image->file_name;
                    unset($path);
                }
            
                $image->delete();
            });
            
            $images = [];
            
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move($destionationPath, $fileName);
                $images[] = $fileName;
            }
            
            foreach ($images as $imag) {
                $image = new Image();
                $image->car_id = $car->id;
                $image->file_name = $imag;
                $image->save();
            }
        }
    
        return redirect()->route('cars.index')->with('success', 'Car updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function all()
    {
        $result = Car::with('images')->get();

        return view('cars.show', compact('result'));
    }
}