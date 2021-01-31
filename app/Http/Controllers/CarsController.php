<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use Exception;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    /**
     * Display a listing of the cars.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Cars::all(), 200);
    }

    /**
     * Show the form for creating a new car.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCar(Request $request)
    {
        return Cars::create($request->all());
    }

    /**
     * Display the specified car.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCar($id)
    {
        $car = Cars::find($id);
        return view('show', compact(['car' => $car]));
    }

    /**
     * Show the form for editing the specified car.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Cars::find($id);
        return view('edit', compact(['car' => $car]));
    }

    /**
     * Update the specified car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCar(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            Cars::where('id', $id)->update($request->all());
            DB::commit();
        } catch (Exception $e) {
            return response()->json(['status' => 'Error occured! Update not successful!']);
        }
        return response()->json(['status' => 'Update successful']);
    }

    /**
     * Remove the specified car from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCar($id)
    {
        //
    }
}