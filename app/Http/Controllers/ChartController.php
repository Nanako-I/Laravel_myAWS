<?php

namespace App\Http\Controllers;

use App\Models\Temperature;
use App\Models\Toilet;
use App\Models\Food;
use App\Models\Speech;
use App\Models\Person;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    //   / 全件データ取得して一覧表示する↓
        // $people は変数名　Person::でPersonモデルにアクセスする
        // $toilet = Toilet::all();
        // ('people')に$peopleが代入される
        
        // 'people'はpeople.blade.phpの省略↓　// compact('people')で合っている↓
        // return view('people',compact('toilet'));
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create(Request $request)
{
    $person = Person::findOrFail($request->people_id);
    return redirect()->route('chartedit', ['people_id' => $person->id]);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($people_id)
{
    $person = Person::findOrFail($people_id);
    
    $temperatures = Temperature::where('people_id', $people_id)
        ->whereNotNull('created_at') // null 値を持つレコードを除外
        ->get();
    
    // データをChart.jsのデータフォーマットに変換
    $labels = $temperatures->pluck('created_at')->map(function ($date) {
        return $date->format('Y-m-d H:i:s'); // 任意のフォーマットに合わせて変更可能
    })->toArray();
    
    $data = $temperatures->pluck('temperature')->toArray();
    
    $foods = Food::where('people_id', $people_id)
        ->whereNotNull('created_at') // null 値を持つレコードを除外
        ->get();
    
    $food_labels = $foods->pluck('created_at')->map(function ($date) {
        return $date->format('Y-m-d H:i:s'); // 任意のフォーマットに合わせて変更可能
    })->toArray();
    $staple_food = $foods->pluck('staple_food')->toArray();
    $side_dish = $foods->pluck('side_dish')->toArray();

    $toilets = Toilet::where('people_id', $people_id)
        ->whereNotNull('created_at') // null 値を持つレコードを除外
        ->get();
    
    $toilet_labels = $toilets->pluck('created_at')->map(function ($date) {
        return $date->format('Y-m-d H:i:s'); // 任意のフォーマットに合わせて変更可能
    })->toArray();
    
    $ben_data = $toilets->pluck('ben_amount')->toArray();
    $bentsuu = $toilets->pluck('bentsuu')->toArray();
    $ben_condition = $toilets->pluck('ben_condition')->toArray();

    return view('chartedit', [
        'labels' => $labels,
        'data' => $data,
        'person' => $person,
        'food_labels' => $food_labels,
        'staple_food' => $staple_food,
        'side_dish' => $side_dish,
        
        'toilet_labels' => $toilet_labels,
        'ben_data' => $ben_data,
        'bentsuu' => $bentsuu,
        'ben_condition' => $ben_condition,
    ]);
}

   



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $people_id)
{
    // $person = Person::findOrFail($people_id);
    // return view('toiletedit', ['id' => $person->id],compact('person'));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}