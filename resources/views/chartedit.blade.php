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
            <canvas id="sampleChart"></canvas>
        </div>
        <div>
            <!--json_encode 関数を使用-->
            <!--PHPの変数 $labels と $data がJSON形式でJavaScriptに渡される↓-->
            <canvas id="temperatureChart" data-labels="{{ json_encode($labels) }}" data-data="{{ json_encode($data) }}"></canvas>
        </div>
    　　<div>
            <!--json_encode 関数を使用-->
            <!--PHPの変数 $labels と $data がJSON形式でJavaScriptに渡される↓-->
           <canvas id="benChart" data-ben-labels="{{ json_encode($toilet_labels) }}" data-ben-data="{{ json_encode($ben_data) }}"></canvas>

        </div>
         
    </div>
  </div>
  
  </body>
  
  　<script>
       
        
        var toiletLabels = @json($toilet_labels);
    var benData = @json($ben_data);
  var chartData = @json($chartData);
    
    </script>
    
 </x-app-layout>
  
{{-- 追加した Blade ディレクティブ --}}
