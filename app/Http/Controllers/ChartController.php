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
    // dd($temperatures);
    
    // データをChart.jsのデータフォーマットに変換
    // $labels = $temperatures->pluck('date'); // 体温データの日付をラベルにする
    // $data = $temperatures->pluck('temperature'); // 体温データをデータポイントにする
    $labels = $temperatures->pluck('created_at')->map(function ($date) {
    return $date->format('Y-m-d H:i:s'); // 任意のフォーマットに合わせて変更可能
    })->toArray();
    $data = $temperatures->pluck('temperature')->toArray();
 

    $toilets = Toilet::where('people_id', $people_id)
    ->whereNotNull('created_at') // null 値を持つレコードを除外
    ->get();
    
   
    $toilet_labels = $toilets->pluck('created_at')->map(function ($date) {
    return $date->format('Y-m-d H:i:s'); // 任意のフォーマットに合わせて変更可能
    })->toArray();
    $ben_data = $toilets->pluck('ben_amount')->toArray();
    
    $chartData = [
    'labels' => $toilet_labels,
    'benData' => [] // '多' と '少' カテゴリーのデータ
];

// foreach ($ben_data as $value) {
//     if ($value === '多') {
//         $chartData['benData'][] = 1.5; // '多' カテゴリーに対応する数値
//     } elseif ($value === '普通') {
//         $chartData['benData'][] = 1.0; // '少' カテゴリーに対応する数値
//     } elseif ($value === '少') {
//         $chartData['benData'][] = 0.5; // '少' カテゴリーに対応する数値
//     } else {
//         $chartData['benData'][] = null; // その他の場合には null を設定
//     }
// }
 


    // ビューにデータを渡す（ここでまとめてviewに渡す）
    return view('chartedit', [
    'labels' => $labels,
    'data' => $data,
    'person' => $person,
    'chartData' => $chartData,  // この行を追加
    'toilet_labels' => $toilet_labels, // 'toilet_labels' をビューに渡す
    'ben_data' => $ben_data, // 'ben_data' をビューに渡す
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