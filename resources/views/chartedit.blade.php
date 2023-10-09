@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-app-layout>

    <!--ヘッダー[START]-->
<body>
  <div class="flex items-center justify-center" style="padding: 20px 0;">
    <div class="flex flex-col items-center">
     <form action="{{ url('people' ) }}" method="POST" class="w-full max-w-lg">
                        @method('PATCH')
                        @csrf
    
      <style>
      body {
            font-family: 'Noto Sans JP', sans-serif; /* フォントをArialに設定 */
          background: rgb(253, 219, 146,0.2);
          }
        h2 {
          font-family: Arial, sans-serif; /* フォントをArialに設定 */
          font-size: 20px; /* フォントサイズを20ピクセルに設定 */
          font-weight: bold;
          text-decoration: underline;
        }
      </style>
        <h2>{{$person->person_name}}さんの記録</h2>
        
      </form>
     
        <div>
            <canvas id="myChart"></canvas>
        </div>
        <div>
            <canvas id="temperatureChart"></canvas>
        </div>
        
        <!--<canvas id="temperatureChart" data-labels="@json($labels)" data-data="@json($data)"></canvas>-->
        
         
    </div>
  </div>
  
  </body>
 </x-app-layout>
  
{{-- 追加した Blade ディレクティブ --}}
