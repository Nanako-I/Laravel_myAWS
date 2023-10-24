<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <form method="POST" action="/upload" enctype="multipart/form-data">
      <form action="{{ url('/read-pdf') }}" method="POST" class="w-full" enctype="multipart/form-data">
      {{ csrf_field() }}

      <input type="file" id="file" name="file" class="form-control" >

      <button type="submit">アップロード</button>
      @csrf
    </form>
    
    @foreach($files as $file)
      <div>
        　<!--ユーザーがPDFのリンクをクリックすると、そのファイルがブラウザで表示される↓-->
         
          
          <a href="{{ asset('storage/' . $file) }}">{{ $file }}</a>
<button id="readButton">文字を読み取る</button>

<div id="pdfContainer"></div>
          
          
          <form action="{{ url('/delete/' . $file) }}" method="POST" class="w-full">
          @method('DELETE') <!-- メソッドをDELETEに設定 -->
          @csrf
          <button type="submit" class="fa-solid fa-trash-can text-gray-600" style="padding: 0 5px; cursor: pointer;" data-file="{{ $file }}">削除</button>
          
          </form>
          
           <textarea id="text-box" class="w-full h-full break-words text-base"></textarea>
      </div>
    @endforeach
    
    <form id="pdfForm" enctype="multipart/form-data">
      <!--<input type="file" id="file" name="file" class="form-control">-->
      <!--<button type="button" id="readButton">文字を読み取る</button>-->
    </form>


   <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.615/pdf.min.js"></script>-->
<script>
      // ゴミ箱アイコンをクリックしたときの処理
      
     document.addEventListener('DOMContentLoaded', function () {
    var trashIcons = document.querySelectorAll('.fa-trash-can');
    trashIcons.forEach(function (icon) {
    icon.addEventListener('click', function () {
      var fileName = this.getAttribute('data-file');
      console.log('クリックされました');

      // CSRFトークンを取得
      var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

      // ファイルを削除するためのAjaxリクエストを送信
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '/delete/' + fileName, true);
      xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
      xhr.setRequestHeader('X-HTTP-Method-Override', 'DELETE'); // DELETEメソッドを設定


      xhr.onload = function () {
        if (xhr.status === 200) {
          // ファイルを削除後の処理（例：リロード）
          location.reload();
        } else {
          console.error(xhr.statusText);
        }
      };

      xhr.onerror = function () {
        console.error('リクエストエラーが発生しました');
      };

      xhr.send();
    });
  });
});

// OCRを実装↓


var readButtons = document.querySelectorAll('#readButton');
readButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        alert('アラートが表示されました！');
            var pdfUrl = "{{ asset('storage/' . $file) }}";
            var pdfContainer = document.getElementById('pdfContainer');
            var text = "";

            // 1. PDFファイルを画像に変換（キャプチャ）
            // ここでPDFファイルを画像に変換するコードを記述

            // 2. Cloud Vision APIを使用してテキスト認識
            const apiKey = "{{ config('app.api_key') }}";
            const apiUrl =  "https://vision.googleapis.com/v1/images:annotate?key=" + apiKey;

            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    requests: [
                        {
                            image: {
                                source: {
                                    imageUri: 'URL_TO_YOUR_PDF_IMAGE_CAPTURE'
                                }
                            },
                            features: [{ type: 'TEXT_DETECTION' }]
                        }
                    ]
                })
            })
            .then(response => response.json())
            .then(data => {
                // 3. OCRの結果を取得し、テキストボックスに表示
                const responseText = data.responses[0].fullTextAnnotation.text;
                document.getElementById('text-box').value = responseText;
            });
        });
 });

    </script>
  </body>
</html>
