<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Person;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Car = Car::all();
        return view('people',compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create(Request $request)
    {
    $person = Car::findOrFail($request->people_id);
    return view('people', ['people' => Person::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $Car = $request->validate([
        ]);
        // バリデーションした内容を保存する↓
        
        $Car = Car::create([
        'people_id' => $request->people_id,
        'car_morning' => $request->car_morning,
        
    ]);
    // return redirect('people/{id}/edit');
   $person = Person::findOrFail($request->people_id);
    return view('people', compact('car_morning', 'people'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request, $people_id)
    {
    $person = Person::findOrFail($people_id);
    return view('people', compact('car_morning'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
