<?php

return [
    'fruits' => env('GOOGLE_APPLICATION_CREDENTIALS', '/storage/json/vision_api_key.json'),
]

// return [
//     'api_key' => 'AIzaSyBtE_NInCBqcXT-DqWpQxTcVTY6T6IcEsY',
// ];
//第一引数は、.envで定義した値を読み込み、第二引数は第一引数がNULLの場合に読み込む値です。
?>