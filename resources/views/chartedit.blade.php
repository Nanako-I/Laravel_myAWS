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
        <canvas id="temperatureChart"></canvas>
        
        <canvas id="temperatureChart" data-labels="@json($labels)" data-data="@json($data)"></canvas>
        
         </div>
    </div>
  </div>
  
  </body>
 </x-app-layout>
  <script type="module">
  
  import Chart from "chart.js/auto";

const ctx = document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [
            {
                label: "# of Votes",
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(255, 159, 64, 0.2)",
                ],
                borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                    "rgba(255, 159, 64, 1)",
                ],
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

// import Chart from "chart.js/auto";

    var temperatureChartCanvas = document.getElementById('temperatureChart').getContext('2d');
    var data = {
        //labels: @json($labels),
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '体温',
            //data: @json($data),
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    var config = {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    var temperatureChart = new Chart(temperatureChartCanvas, config);
    temperatureChart.update();
      
    </script>
{{-- 追加した Blade ディレクティブ --}}
