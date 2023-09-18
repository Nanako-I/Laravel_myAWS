<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>Document</title>
  </head>
  <body>
    <form method="POST" action="/upload" enctype="multipart/form-data">
      {{ csrf_field() }}

      <input type="file" id="file" name="file" class="form-control" >

      <button type="submit">アップロード</button>
    </form>
    
    <a href="/storage/体温表.pdf">アップロードファイル</a>
    
  </body>
</html>