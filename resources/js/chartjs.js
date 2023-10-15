// import Chart from "chart.js/auto";
import { Chart } from 'chart.js/auto';

const ctx = document.getElementById("myChart").getContext("2d");
const myChart2 =  {
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
};
let myChart = new Chart(ctx, myChart2);

// import Chart2 from "chart.js/auto"; // 別の変数名で2つ目のChartをインポート
import { Chart2 } from 'chart.js/auto';
const ctx2 = document.getElementById("sampleChart").getContext("2d");
const sampleChart2 =  {
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
};

let sampleChart = new Chart(ctx2, sampleChart2);


import { Chart3 } from 'chart.js/auto';
    const ctx3 = document.getElementById("temperatureChart").getContext("2d");
    const chartElement = document.getElementById("temperatureChart");
    
    // JSON.parse は、JavaScriptでJSON形式の文字列をJavaScriptオブジェクトに変換するための組み込みの関数↓
    const chartLabels = JSON.parse(chartElement.getAttribute("data-labels"));
    const chartData = JSON.parse(chartElement.getAttribute("data-data"));
    
    // 例: "2023-10-25 14:30:00" を "10月25日" のフォーマットに変換する関数
    // function formatDateToMonthDay(dateString) {
    //     const date = new Date(dateString);
    //     const month = (date.getMonth() + 1).toString().padStart(2, '0'); // 月を2桁の文字列に
    //     const day = date.getDate().toString().padStart(2, '0'); // 日を2桁の文字列に
    //     return `${month}月${day}日`;
    // }

    // // chartDataの日付データを変換　// この時点で、formattedChartData は ["10月25日", "10月26日", ...] のような形式になる
    // const formattedChartData = chartData.map(dateString => formatDateToMonthDay(dateString));
    // // chartDataに含まれる日付データを日付順にソート
    // chartData.sort((a, b) => new Date(a) - new Date(b));


if (chartLabels && chartData) {
    const data = {
        labels: chartLabels,
        // labels: formattedChartData, // 変換後の日付データを使用
        datasets: [{
            label: '体温',
            data: chartData,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    const config = {
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


var temperatureChart = new Chart(ctx3, config);
};



import { Chart4 } from 'chart.js/auto';
    const ctx4 = document.getElementById("benChart").getContext("2d");
    const benChartElement = document.getElementById("benChart");
    
    // JSON.parse は、JavaScriptでJSON形式の文字列をJavaScriptオブジェクトに変換するための組み込みの関数↓
    const benchartLabels = JSON.parse(benChartElement.getAttribute("data-ben-labels"));
    // const benchartData = JSON.parse(benChartElement.getAttribute("data-ben-data"));
    const benData = JSON.parse(benChartElement.getAttribute("data-ben-data"));

// カテゴリーを数値に変換
const convertedData = benData.map(category => {
  if (category === 'many') {
    return 1.5;
  } else if (category === 'normal') {
    return 1.0;
  } else if (category === 'less') {
    return 0.5;
  } else {
    return null;
  }
});


console.log(chartData);


if (benchartLabels && convertedData) {
    // console.log(convertedData);

    const bendata = {
        labels: benchartLabels,
        datasets: [
            {
                label: '排便量',
                data: convertedData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
           
        ]
    };

    const benconfig = {
        type: 'line',
        data: bendata,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 1.5, 
                    ticks: {
                        stepSize: 0.5, // y軸の刻み幅を設定
                        callback: function (value, index, values) {
                            if (value === 0.5) {
                                return '少';
                            } else if (value === 1.0) {
                                return '普通';
                            } else if (value === 1.5) {
                                return '多';
                            } else {
                                return '';
                            }
                        }
                    }
                }
            }
        }
    };

    var benChart = new Chart(ctx4, benconfig);
}