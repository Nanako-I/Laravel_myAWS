<?php

namespace App\Http\Controllers;

use App\Models\Temperature;
use App\Models\Person;

use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    
    public function index()
    {
       $temperature = Temperature::all();
        // ('people')に$peopleが代入される
        
        // 'people'はpeople.blade.phpの省略↓　// compact('people')で合っている↓
        return view('people',compact('temperature'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
   public function create(Request $request)
{
    $person = Temperature::findOrFail($request->people_id);
return redirect()->route('temperature.edit', ['people_id' => $person->id]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//         $temperature = new Temperature;
// $temperature->value = $storeData['value'];
// $temperature->date = $storeData['date'];
// $temperature->people_id = $storeData['people_id'];
// $temperature->save();

         $storeData = $request->validate([
            'temperature' => 'required|max:255',
            // 'people_id' => 'required|exists:people,id',
        ]);
        // バリデーションした内容を保存する↓
        
        $temperature = Temperature::create([
        'temperature' => $request->temperature,
    'people_id' => $request->people_id,
         
    ]);
    // return redirect('people/{id}/edit');
   $person = Person::findOrFail($request->people_id);
    return redirect()->route('temperature.edit', ['people_id' => $person->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    
    $person = Person::findOrFail($id);
    $temperatures = $person->temperatures;

    return view('people', compact('temperatures'));
    
    // $temperature = Temperature::findOrFail($id);

    // return view('temperaturelist', compact('temperature'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\temperature  $temperature
     * @return \Illuminate\Http\Response
     */
//     public function edit($id)
// {
//     $person = Person::findOrFail($request->people_id);
//     return view('temperature.edit', ['id' => $person->id],compact('person'));
// }

public function edit(Request $request, $people_id)
{
    $person = Person::findOrFail($people_id);
    return view('temperatureedit', ['id' => $person->id],compact('person'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, temperature $temperature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function destroy(temperature $temperature)
    {
        //
    }
}