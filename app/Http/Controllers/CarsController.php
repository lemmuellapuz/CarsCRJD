<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class CarsController extends Controller
{
    
    public function index()
    {
        return view('contents.cars.index');
    }

    public function table() 
    {
        $cars = Car::select('id', 'type', 'model');

        return DataTables::of($cars)
        ->addColumn('actions', function($car){
            $edit_btn = '<a href="' . route('car.edit', ['car' => $car]) . '" class="btn btn-primary"> Edit </a>';
            $delete_btn = '<a href="#" onclick="deleteCar(\''. $car->id .'\')" class="btn btn-danger"> Delete </a>';

            return $edit_btn . $delete_btn;
        })
        ->addColumn('type_name', function($car){
            return $car->type;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
    
    public function create()
    {
        return view('contents.cars.create');
    }
    
    public function store(StoreCarRequest $request)
    {
        try {
            
            Car::create([
                'type' => $request->type,
                'model' => $request->model,
                'year' => $request->year,
            ]);

            return redirect()->route('car.index')->with('success', 'Car saved.');

        } catch (\Throwable $th) {
            info('Store car error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again after a couple of minutes');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Car $car)
    {
        return view('contents.cars.edit')->with('car', $car);
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        try {
            
            $car->update([
                'type' => $request->type,
                'model' => $request->model,
                'year' => $request->year,
            ]);

            return redirect()->route('car.index')->with('success', 'Car updated.');

        } catch (\Throwable $th) {
            info('Update car error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again after a couple of minutes');
        }
    }

    public function destroy(Car $car)
    {
        try {
            
            $car->delete();

            return redirect()->route('car.index')->with('success', 'Car deleted.');

        } catch (\Throwable $th) {
            info('Destroy car error: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again after a couple of minutes');
        }
    }
}
