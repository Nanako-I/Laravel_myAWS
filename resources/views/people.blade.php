@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-app-layout>

    <!--ヘッダー[START]-->

    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <!-- resources/views/components/errors.blade.php -->
        @if (count($errors) > 0)
            <!-- Form Error List -->
            <div class="flex justify-between p-4 items-center bg-red-500 text-white rounded-lg border-2 p-2 border-white">
                <div><strong>入力した文字を修正してください。</strong></div> 
                <div>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    
    <!--<div class="flex bg-gray-100">-->

        <!--左エリア[START]--> 
        <!--<div class="text-gray-700 text-left px-4 py-4 m-2">-->
            
            


            <!-- 本のタイトル -->
            
    <!--    
       
        <!--左エリア[END]--> 
        
    
    
    <!--右側エリア[START]-->
   <!-- <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">-->
        
　　　<!--<section class="text-gray-600 body-font" _msthidden="18">-->
   <!-- 　   　<div class="container px-5 py-24 mx-auto" _msthidden="18">-->
　　　<!--　　　<div class="flex flex-wrap -m-4" _msthidden="18">-->
<body>
<style>
  /* フォントを指定 */
  
  body {
    font-family: 'Noto Sans JP', sans-serif; /* フォントをArialに設定 */
  background: linear-gradient(135deg, rgb(209, 253, 255,0.5), rgb(253, 219, 146,1));
  }
  </style>
        <!--// 処理-->
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        
           <!--<section class="text-gray-600 body-font" _msthidden="29">-->
  <!--<div class="container px-5 py-24 mx-auto" _msthidden="29">-->
   <div class="flex flex-col items-center justify-center w-full my-2">
        <style>
         @import url('https://fonts.googleapis.com/css2?family=Arial&display=swap');
            h1 {
            font-family: Arial, sans-serif; /* フォントをArialに設定 */
          }
        </style>
      <h1 class="sm:text-2xl text-3xl font-bold title-font mb-4 text-gray-900" _msttexthash="91611" _msthidden="1" _msthash="63"></h1>
    </div>
    
                <!-- トイレ誘導のためのモーダル -->
            <div class="fixed inset-0 overflow-y-auto hidden" id="myModal">
                  <!--<div class="modal-overlay absolute inset-0 bg-gray-500 opacity-75"></div>-->
                  <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                    <div class="modal-content py-4 text-left px-6">
                      <div class="modal-header flex justify-between items-center">
                        <h5 class="modal-title text-2xl font-bold">食事記録</h5>
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="閉じる">-->
                        <!--  <span aria-hidden="true">&times;</span>-->
                        <!--</button>-->
                      </div>
                      <div class="modal-body py-2">
                        <p class="text-lg">朝ごはんの記録はつけましたか？</p>
                      </div>
                      <div class="modal-footer flex justify-end items-center py-2">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="myModal .close">閉じる</button>
                      </div>
                    </div>
                  </div>
            </div>



    <!-- 現在の本 -->
  <div class="flex flex-row justify-start w-screen overflow-x-auto">
    <div class="slider">
        
    @csrf
                @if (!is_null($people) && count($people) > 0)
             <div class="flex flex-row justify-center tw-flex-row h-150 -m-2">

                @foreach ($people as $person)
                <!--$person->load('temperatures');-->
                  <div class="p-2 h-full lg:w-1/3 md:w-full flex">
                   <div class="slide height:auto  border-2 p-2 p-4 w-full md:w-64 lg:w-100 rounded-lg bg-white">
                     <style>
                      .slide {
                        width:100vw;
                        background: rgb(244,244,244);
                      }
                      @media screen and (min-width: 768px){
                        .slide {
                            width:600px;
                        }
                      }
                      @media screen and (min-width: 1024px){
                        .slide {
                            width:700px;
                        }
                      }
                     
                     </style>

                      <div class="h-30 flex flex-row items-center rounded-lg bg-white width:100vw">
                          @if ($person->filename)
                              <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="{{ asset('storage/sample/' . $person->filename) }}">
                            @else
                              <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80">
                            @endif
                            
                                <style>
                                  /* フォントを指定 */
                                  .h2 {
                                    font-family: Arial, sans-serif; /* フォントをArialに設定 */
                                  }
                                   .p {
                                    font-family: Arial, sans-serif; /* フォントをArialに設定 */
                                  }
                                 </style>
                                        <div class="flex-grow">
                                          <h2 class="h2 text-gray-900 title-font font-bold text-2.5xl" _msttexthash="277030">{{$person->person_name}}</h2>
                                          <p class="text-gray-900 font-bold text-xs" _msttexthash="150072">{{$person->date_of_birth}}生まれ</p>
                                        </div>
                      </div>
                      
                   <!-- 食事量登録↓ -->
                   　　　    <div class="border-2 p-2 rounded-lg bg-white m-2">
                            <div class="flex justify-start items-center">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                <i class="fa-solid fa-bowl-rice text-emerald-700" style="font-size: 2em; padding: 0 5px; transition: transform 0.2s;"></i>
                                <p class="text-emerald-700 font-bold text-xl ml-2">食事量</p>
                            </div>
                              <div class="flex items-center justify-center p-4 flex-col md:flex-row">
                                <div class="h-28 md:h-48 w-full md:w-40 border-2 p-4 rounded-lg bg-white mt-4 md:mt-0 shadow-gray-400">
                                       <div class="flex justify-start ">
                                    <!--<div class="flex flex-grow flex-shrink-0 flex-basis-40 border p-4 rounded-lg bg-white mr-4">-->
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                        <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                            <i class="fa-solid fa-dove text-cyan-500" style="padding: 0 5px;"></i>
                                        
                                           <div class="flex-grow">
                                              
                                        
                                           @if (!is_null($person) && !empty($person->foods) && count($person->foods) > 0)
                                              @php
                                                  $lastFood = $person->foods->last();
                                                  $lastFoodTime = $lastFood ? $lastFood->created_at->format('h:i:s A') : null;
                                              @endphp
                                          
                                              @if (is_null($lastFoodTime))
                                                      　<div class="flex items-center justify-center p-4">
                                                              <p class="text-red-500 font-bold text-xl">登録して<br>ください</p>
                                                              <a href="{{ url('food/'.$person->id.'/edit') }}" class="relative  ml-2">
                                                                 @csrf
                                                                    <i class="material-icons md-90 ml-auto">add</i>
                                                              </a>
                                                    　　</div>
                                                      
                                                        
                                                      @else
                                                      
                                                        <div class="flex justify-evenly">
                                                            <a href="{{ route('foods.show', $lastFood->id) }}" class="font-bold text-xl">
                                                                <div>
                                                                    <p class="text-gray-900 font-bold text-sm">主食:</p>
                                                                    <p class="text-gray-900 font-bold text-xl">{{ $lastFood->staple_food }}</p>
                                                                </div>
                                                            </a>
                                                        
                                                            <a href="{{ route('foods.show', $lastFood->id) }}" class="font-bold text-xl">
                                                                <div>
                                                                    <p class="text-gray-900 font-bold text-sm">副食:</p>
                                                                    <p class="text-gray-900 font-bold text-xl">{{ $lastFood->side_dish }}</p>
                                                                </div>
                                                            </a>
                                                        
                                                            <a href="{{ route('foods.show', $lastFood->id) }}" class="font-bold text-xl">
                                                                <div>
                                                                    <p class="text-gray-900 font-bold text-sm">服用:</p>
                                                                    <p class="text-gray-900 font-bold text-xl">{{ $lastFood->medicine == 'yes' ? 'あり' : 'なし' }}</p>
                                                                </div>
                                                             </a>
                                                        </div>
                                                    @endif
                                                        @else
                                                            <div class="flex items-center justify-center p-4">
                                                                <p class="text-red-500 font-bold text-xl">登録して<br>ください</p>
                                                                <a href="{{ url('food/'.$person->id.'/edit') }}" class="relative ml-2">
                                                                    @csrf
                                                                    <i class="material-icons md-90 ml-auto">add</i>
                                                                </a>
                                                            </div>
                                                        @endif
                                                </div>
                                        </div>
                                </div>
                                
                                  <!--<div class="flex flex-grow flex-shrink-0 flex-basis-40 border p-4 rounded-lg bg-white mr-4">-->
                                   <div class="h-28 md:h-48 w-full md:w-40 border-2 p-4 rounded-lg bg-white mt-4 md:mt-0 shadow-gray-400">
                                      <div class="flex justify-start ">
                                    <!--<div class="flex flex-grow flex-shrink-0 flex-basis-40 border p-4 rounded-lg bg-white mr-4">-->
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                        <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                            <i class="fa-solid fa-sun text-orange-600" style="padding: 0 5px;"></i>
                                        <div class="flex-grow">
                                              
                                        
                                          @if (!is_null($person) && !empty($person->foods) && count($person->foods) > 0)
                                                @php
                                                    $lastFood = $person->foods->last();
                                                    $secondLastFood = $person->foods->reverse()->skip(1)->first();
                                                    $secondLastFoodTime = $secondLastFood ? $secondLastFood->created_at->format('h:i:s A') : null;
                                                @endphp
                                          
                                              @if (is_null($secondLastFoodTime))
                                                      　<div class="flex items-center justify-center p-4">
                                                              <p class="text-red-500 font-bold text-xl">登録して<br>ください</p>
                                                              <a href="{{ url('food/'.$person->id.'/edit') }}" class="relative  ml-2">
                                                                 @csrf
                                                                    <i class="material-icons md-90 ml-auto">add</i>
                                                              </a>
                                                    　　</div>
                                                      
                                                        
                                                      @else
                                                      
                                                        <div class="flex justify-evenly">
                                                            <a href="{{ route('foods.show', $secondLastFood->id) }}" class="font-bold text-xl">
                                                                <div>
                                                                    <p class="text-gray-900 font-bold text-sm">主食:</p>
                                                                    <p class="text-gray-900 font-bold text-xl">{{ $secondLastFood->staple_food }}</p>
                                                                </div>
                                                            </a>
                                                        
                                                            <a href="{{ route('foods.show', $secondLastFood->id) }}" class="font-bold text-xl">
                                                                <div>
                                                                    <p class="text-gray-900 font-bold text-sm">副食:</p>
                                                                    <p class="text-gray-900 font-bold text-xl">{{ $secondLastFood->side_dish }}</p>
                                                                </div>
                                                            </a>
                                                        
                                                            <a href="{{ route('foods.show', $secondLastFood->id) }}" class="font-bold text-xl">
                                                                <div>
                                                                    <p class="text-gray-900 font-bold text-sm">服用:</p>
                                                                    <p class="text-gray-900 font-bold text-xl">{{ $secondLastFood->medicine == 'yes' ? 'あり' : 'なし' }}</p>
                                                                </div>
                                                             </a>
                                                        </div>
                                                    @endif
                                                        @else
                                                            <div class="flex items-center justify-center p-4">
                                                                <p class="text-red-500 font-bold text-xl">登録して<br>ください</p>
                                                                <a href="{{ url('food/'.$person->id.'/edit') }}" class="relative ml-2">
                                                                    @csrf
                                                                    <i class="material-icons md-90 ml-auto">add</i>
                                                                </a>
                                                            </div>
                                                        @endif
                                                </div>
                                        </div>
                                </div>
                                  <!--<div class="flex flex-grow flex-shrink-0 flex-basis-40 border p-4 rounded-lg bg-white mr-4">-->
                                  <div class="h-28 md:h-48 w-full md:w-40 border-2 p-4 rounded-lg bg-white mt-4 md:mt-0 shadow-gray-400">
                                      <div class="flex justify-start ">
                                    <!--<div class="flex flex-grow flex-shrink-0 flex-basis-40 border p-4 rounded-lg bg-white mr-4">-->
                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                            <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                                <i class="fa-solid fa-moon text-violet-700" style="padding: 0 5px;"></i>
                                            <div class="flex-grow">
                                            <!--<p class="text-gray-900 font-bold text-base text-violet-700">夜</p>-->
                                        
                                   @if (!is_null($person) && !empty($person->foods) && count($person->foods) > 0)
                                                        @php
                                                            $foods = $person->foods;
                                                            $lastFood = $foods->last();
                                                            $secondLastFood = $foods->reverse()->skip(1)->first();
                                                            $thirdLastFood = $foods->reverse()->skip(2)->first();
                                                    
                                                            $thirdLastFoodTime = $thirdLastFood ? $thirdLastFood->created_at->format('h:i:s A') : null;
                                                        @endphp
                                                    
                                                        @if (is_null($thirdLastFoodTime))
                                                            <div class="flex items-center justify-center p-4">
                                                                <p class="text-red-500 font-bold text-xl">登録して<br>ください</p>
                                                                <a href="{{ url('food/'.$person->id.'/edit') }}" class="relative  ml-2">
                                                                    @csrf
                                                                    <i class="material-icons md-90 ml-auto">add</i>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div class="flex justify-evenly">
                                                                <a href="{{ route('foods.show', $thirdLastFood->id) }}" class="font-bold text-xl">
                                                                    <div>
                                                                        <p class="text-gray-900 font-bold text-sm">主食:</p>
                                                                        <p class="text-gray-900 font-bold text-xl">{{ $thirdLastFood->staple_food }}</p>
                                                                    </div>
                                                                </a>
                                                    
                                                                <a href="{{ route('foods.show', $thirdLastFood->id) }}" class="font-bold text-xl">
                                                                    <div>
                                                                        <p class="text-gray-900 font-bold text-sm">副食:</p>
                                                                        <p class="text-gray-900 font-bold text-xl">{{ $thirdLastFood->side_dish }}</p>
                                                                    </div>
                                                                </a>
                                                    
                                                                <a href="{{ route('foods.show', $thirdLastFood->id) }}" class="font-bold text-xl">
                                                                    <div>
                                                                        <p class="text-gray-900 font-bold text-sm">服用:</p>
                                                                        <p class="text-gray-900 font-bold text-xl">{{ $thirdLastFood->medicine == 'yes' ? 'あり' : 'なし' }}</p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    @else
                                                        <div class="flex items-center justify-center p-4">
                                                            <p class="text-red-500 font-bold text-xl">登録して<br>ください</p>
                                                            <a href="{{ url('food/'.$person->id.'/edit') }}" class="relative ml-2">
                                                                @csrf
                                                                <i class="material-icons md-90 ml-auto">add</i>
                                                            </a>
                                                        </div>
                                                    @endif

                                                </div>
                                        </div>
                                </div>
                              </div>
                          </div>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                        <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                        <a href="{{ url('food/'.$person->id.'/edit') }}" class="relative">
                                          
                                          <!--<i class="fa-solid fa-bowl-rice text-blue-500 hover:text-blue-500" style="font-size: 2em; padding: 0 5px; transition: transform 0.2s;"></i>-->
                                            <!--<span class="absolute bottom-full left-1/2 transform -translate-x-1/2 bg-white text-gray-900 px-6 py-2 rounded-lg text-lg font-bold opacity-0 transition-opacity duration-300 border-4 border-lime-600" style="writing-mode: horizontal-tb; width: 200px;">食事量を入力する</span>-->
                                        </a>
                                        
                        <!-- 体温登録↓ -->
                        　    　　  <div class="border-2 p-2 rounded-lg bg-white m-2">
                                      <div class="flex justify-start items-center">
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                        <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                        <i class="fa-solid fa-thermometer text-pink-600" style="font-size: 2em; padding: 0 5px; transition: transform 0.2s;"></i>
                                        <p class="text-pink-600 font-bold text-xl ml-2">体温</p>
                                    </div>
                                  <div class="flex items-center justify-center p-4">
                                   
                                            @if (!is_null($person) && count($person->temperatures) > 0)
                                            @php
                                              $lastTemperature = $person->temperatures->last();
                                            @endphp
                                        
                                            @if ($lastTemperature->created_at->diffInHours(now()) >= 6)
                                                <p class="text-red-500 font-bold text-xl">検温してください</p>
                                            @else
                                                <a href="{{ route('temperatures.show', $lastTemperature->id) }}" class="font-bold text-xl">{{ $lastTemperature->temperature }}℃</a>
                                            @endif
                                        
                                    @endif
                                    
                                        <a href="{{ url('temperature/'.$person->id.'/edit') }}">
                                        <!--<i class="fa-solid fa-thermometer text-pink-400 hover:text-pink-400" style="font-size: 2em; padding: 0 5px;"></i>-->
                                          @csrf
                                        <i class="material-icons md-90 ml-auto">add</i>
                                  </div>
                                </div>
                                       
                                        <!-- トイレ登録↓ -->
                        　    　 　  <div class="border-2 p-2 rounded-lg bg-white m-2">
                                        <div class="flex justify-start items-center">
                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                            <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                            <i class="fa-solid fa-toilet-paper text-blue-700" style="font-size: 2em; padding: 0 5px; transition: transform 0.2s;"></i>
                                            <p class="text-blue-700 font-bold text-xl ml-2">トイレ</p>
                                        </div>
                                    <div class="flex items-center justify-center p-4">
                                   
                                          @if (!is_null($person) && count($person->toilets) > 0)
                                          
                                              @php
                                                $lastToilets = $person->toilets->last();
                                              @endphp
                                        
                                           @if ($lastToilets->created_at->diffInHours(now()) >= 6)
                                              <p class="text-red-500 font-bold text-xl">誘導してください</p>
                                              @else
                                                @if($lastToilets->urine_one || $lastToilets->urine_two || $lastToilets->urine_three)
                                                <div class="mx-1.5">
                                                <p class="text-gray-900 font-bold text-sm">尿</p>
                                                  @if($lastToilets->urine_one)
                                                  <a href="{{ route('toilets.show', $lastToilets->id) }}" class="text-gray-900 font-bold text-xl">{{ $lastToilets->urine_one }}</a>
                                                  @endif
                                                  @if($lastToilets->urine_two)
                                                  <a href="{{ route('toilets.show', $lastToilets->id) }}" class="text-gray-900 font-bold text-xl">{{ $lastToilets->urine_two }}</a>
                                                  @endif
                                                  @if($lastToilets->urine_three)
                                                  <a href="{{ route('toilets.show', $lastToilets->id) }}" class="text-gray-900 font-bold text-xl">{{ $lastToilets->urine_three }}</a>
                                                  @endif
                                                 </div>
                                                @endif
                                                  @if($lastToilets->ben_one || $lastToilets->ben_two || $lastToilets->ben_three)
                                                   <div class="mx-1.5">
                                                    <p class="text-gray-900 font-bold text-sm">便</p>
                                                    @if($lastToilets->ben_one)
                                                    <a href="{{ route('toilets.show', $lastToilets->id) }}" class="text-gray-900 font-bold text-xl">{{ $lastToilets->ben_one }}</a>
                                                    @endif
                                                    @if($lastToilets->ben_two)
                                                    <a href="{{ route('toilets.show', $lastToilets->id) }}" class="text-gray-900 font-bold text-xl">{{ $lastToilets->ben_two }}</a>
                                                    @endif
                                                    @if($lastToilets->ben_three)
                                                    <a href="{{ route('toilets.show', $lastToilets->id) }}" class="text-gray-900 font-bold text-xl">{{ $lastToilets->ben_three }}</a>
                                                    @endif
                                                   </div>
                                                  @endif
                                            @endif
                                          @endif

                                        <a href="{{ url('toilet/'.$person->id.'/edit') }}">
                                        <!--<i class="fa-solid fa-toilet-paper text-blue-500 hover:text-blue-500" style="font-size: 2em; padding: 0 5px;"></i>-->
                                          @csrf
                                        <i class="material-icons md-90 ml-auto">add</i>
                                    </div>
                                  </div>
                                        
                                         <!-- 活動登録↓ -->
                        　    　<div class="border-2 p-2 rounded-lg bg-white m-2">
                                    <div class="flex justify-start items-center">
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                        <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                        <i class="fa-solid fa-volume-high text-orange-600" style="font-size: 2em; padding: 0 5px; transition: transform 0.2s;"></i>
                                        <p class="text-orange-600 font-bold text-xl ml-2">活動の記録</p>
                                    </div>
                                        <div class="flex items-center justify-center p-4">
                                            @if (!is_null($person) && count($person->speeches) > 0)
                                                @php
                                                    $lastSpeech = $person->speeches->last();
                                                    $lastSpeechDate = \Carbon\Carbon::parse($lastSpeech->created_at)->toDateString();
                                                    $today = \Carbon\Carbon::now()->toDateString();
                                                @endphp
                                                @if ($lastSpeechDate === $today)
                                                    <p class="font-bold text-xl p-2">済</p>
                                                    <a href="{{ url('speech/'.$person->id.'/edit') }}">
                                                        <!--<i class="fa-solid fa-volume-high text-orange-400" style="font-size: 2em; padding: 0 5px;"></i>-->
                                                        @csrf
                                                        <i class="material-icons md-90 ml-auto">add</i>
                                                    </a>
                                                    <!--<a href="{{ route('speeches.show', $lastSpeech->id) }}" class="font-bold text-xl">{{ $lastSpeech->activity }}</a>-->
                                                @else
                                                    <p class="text-red-500 font-bold text-xl">登録してください</p>
                                                    <a href="{{ url('speech/'.$person->id.'/edit') }}">
                                                        <!--<i class="fa-solid fa-volume-high text-orange-400" style="font-size: 2em; padding: 0 5px;"></i>-->
                                                        @csrf
                                                        <i class="material-icons md-90 ml-auto">add</i>
                                                    </a>
                                                @endif
                                            @else
                                                <p class="text-red-500 font-bold text-xl">登録してください</p>
                                                <a href="{{ url('speech/'.$person->id.'/edit') }}">
                                                    <!--<i class="fa-solid fa-volume-high text-orange-400" style="font-size: 2em; padding: 0 5px;"></i>-->
                                                    @csrf
                                                    <i class="material-icons md-90 ml-auto">add</i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    　　<div class="border-2 p-2 rounded-lg bg-white m-2">
                                          <div class="flex justify-start items-center">
                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                                            <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
                                            <i class="fa-regular fa-clipboard text-green-700" style="font-size: 2em; padding: 0 5px; transition: transform 0.2s;"></i>
                                            <p class="text-green-700 font-bold text-xl ml-2">{{ $person->person_name }}さんの記録</p>
                                          </div>
                                          <div class="flex justify-center mt-4">
                                            <a href="{{ url('record/'.$person->id.'/edit') }}" class="relative">
                                              @csrf
                                              <i class="material-icons md-90">add</i>
                                            </a>
                                          </div>
                                    　　</div>

                                    

                                        <!--<a href="{{ url('record/'.$person->id.'/edit') }}">-->
                                        <!--<i class="fa-regular fa-clipboard text-green-500" style="font-size: 2em; padding: 0 5px;"></i>-->
<!-- Display an icon -->
      
                      <!--<a href="{{ route('people.edit', ['id' => $person->id]) }}">-->
                      <!--  @csrf-->
                      <!--  <i class="material-icons md-90 ml-auto">add</i>-->
                      <!--</a>-->
                    </div>
                  </div>
                @endforeach
              </div>
              @if (count($people) % 2 == 0)
                <div class="flex justify-center">
                  <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                    <!--<div class="h-50 flex items-center border-gray-200 border-2 p-4 rounded-lg"></div>-->
                  </div>
                </div>
              @endif
            @endif
    </div>
  </div>
<!--</section>-->


   

            　　
   　　　　　　　　　　　　　
    <!--右側エリア[END]--> 

</div>
 <!--全エリア[END]-->

</body>
</html>

<script>
var showToiletModal_flg = false;
function showToiletModal() {
  if(!showToiletModal_flg){
    // 現在の時刻を取得
    var currentTime = new Date();
    //11：30になったらモーダル表示させる　ターゲットの時刻を設定 
    var targetTime_from = new Date();
    targetTime_from.setHours(10);
    targetTime_from.setMinutes(15);
    
    var targetTime_to = new Date();
    targetTime_to.setHours(11);
    targetTime_to.setMinutes(30);
    
    
    // 現在の時刻がターゲットの時刻に達した場合
    if (currentTime >= targetTime_from && currentTime <= targetTime_to) {
    // モーダルを表示する
    var myModal = document.getElementById('myModal');
    myModal.classList.add('show');
    myModal.style.display = 'block';
    }
    
    var myModal = document.getElementById('myModal'); // モーダル要素を取得
    // var myModalClose = document.querySelector('#myModal .close'); // 閉じるボタン要素を取得
    var myModalClose = document.getElementById('myModal .close'); 
    
    myModalClose.addEventListener('click', function() {
      // Bootstrapのモーダルを閉じるメソッドを実行
      myModal.style.display = 'none';
      myModal.classList.remove('show');
      showToiletModal_flg = true;
    });
  }
}
// showToiletModal関数を定期的に実行する (例: 1分ごとに実行)
setInterval(showToiletModal, 60000);
const slides = document.querySelectorAll('.slide');
let currentSlide = 0;
function showSlide(n) {
  // すべてのスライドを非表示にする
  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove('active');
  }
  // 指定されたスライドを表示する
  slides[n].classList.add('active');
  currentSlide = n;
}
function nextSlide() {
  // 次のスライドを表示する
  if (currentSlide === slides.length - 1) {
    showSlide(0);
  } else {
    showSlide(currentSlide + 1);
  }
}
</script>
</x-app-layout>