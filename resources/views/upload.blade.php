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
    
    <!--<a href="/storage/体温表.pdf">アップロードファイル</a>-->
   

  @foreach($files as $file)
      <a href="{{ asset('storage/' . $file) }}">{{ $file }}</a><br>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
      <script src="https://kit.fontawesome.com/de653d534a.js" crossorigin="anonymous"></script>
      <i class="fa-solid fa-trash-can text-gra-600" style="padding: 0 5px;"></i>
  @endforeach

    
  </body>
</html>