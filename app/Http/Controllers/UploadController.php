<?php

namespace App\Http\Controllers;
use App\Models\Upload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// OCR付け足し↓
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\VisionClient;


class UploadController extends Controller
{
    public function index(){
         
        
         // スキャンするディレクトリのパスを指定↓-->
    $directory = storage_path('app/public');
    
     // ディレクトリ内のファイル一覧を取得　. と .. を除外↓↓-->
     $files = array_diff(scandir($directory), ['.', '..']);
   
    
    //   upload.blade.phpを表示させる↓
    	return view('upload', compact('files'));
    }
    public function store(Request $request){
        
        $request->validate([
            'file' => 'required|file'

        // 'file' => 'required|file|mimes:pdf', // ここでバリデーションルールを設定（PDFファイルしか許容しない場合）
    ]);
    
    if ($request->hasFile('file')) {
        $uploadedFile = $request->file('file');
        // ファイル名をそのままで保存
        // $file_name = $request->file('file')->getClientOriginalName();
        // $request->file('file')->storeAs('public', $file_name);
        $file_name = $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs('public', $file_name);

        // ファイル情報をデータベースに保存
        $upload = new Upload();
        $upload->file_name = $file_name;
        $upload->file_path = 'storage/' . $file_name; // ファイルの保存パスに注意
        $upload->save();


        // アップロード成功時の処理
        return redirect('upload')->with('success', 'ファイルがアップロードされました');
    } else {
        // ファイルがアップロードされていない場合の処理
        // エラーメッセージをセットし、アップロードフォームに戻る
        return redirect('upload')->with('error', 'ファイルが選択されていません');
    }
}


        // アップロードしたファイルの情報を確認↓
        // dd($request->file('file'));
        
        
        // $request->file('file')->store('');
        
        // ファイル名をupload_file.pdfで保存↓
        // $request->file('file')->storeAs('','upload_file.pdf');
        
        // ファイル名をそのままで保存↓
        // $file_name = $request->file('file')->getClientOriginalName();
        // $request->file('file')->storeAs('public',$file_name);
        
        // return view('upload');
    
    
        public function deleteFile($file_name)
        {
            Uploads::where('file_name', $file_name)->delete();
            // ファイルを削除
            Storage::delete('public/' . $file_name);
        
            return response()->json(['message' => 'ファイルが削除されました']);
        }
        
        
        public function convertPdfToImage()
        {
            // PDFファイルをイメージに変換
            exec('gs -sDEVICE=jpeg -o /path/to/output.jpg /path/to/input.pdf');
        }
        
     public function convert(Request $request) {
        // アップロードされたPDFファイルを取得
        $pdfFile = $request->file('pdfFile');
        
        // 一意のファイル名を生成
        $imageFileName = uniqid('image_') . '.jpg';
        
        // PDFを画像に変換
        //gs -sDEVICE=pngalpha -o usagi.png usagi.pdf
        exec("gs -sDEVICE=jpeg -o " . storage_path('storage/' . $imageFileName) . " " . $pdfFile->path());
        
        // 画像からテキストを抽出（OCR）
        $imagePath = storage_path('app/public/images/' . $imageFileName);
        $extractedText = $this->performOCR($imagePath);
        
        // テキストをJSON形式で返す
        return response()->json(['text' => $extractedText]);
        }


    public function showUploadForm()
    {
        return view('upload'); // アップロードフォームを表示
    }

    public function convertPDFsToPNG(Request $request)
    {
        // フォームからPDFファイルを取得
        // $pdfFile = $request->file('file');
         $pdfFiles = Storage::files('public');
         
        // dd($pdfFile);

        foreach ($pdfFiles as $pdfFile) {
        // ファイルの実際のパスを取得
        $pdfPath = storage_path("app/public/$pdfFile");

        // ファイル名を変更してPNGファイルのパスを生成
        $pngPath = str_replace('.pdf', '.png', $pdfPath);

        // Ghostscriptを使用してPDFをPNGに変換
        $command = "gs -sDEVICE=pngalpha -o $pngPath $pdfPath";
        shell_exec($command);
            // echo $output;

            // PNGファイルをブラウザで表示
            return response()->file(storage_path("app/public/$pngPath"));
        }

        return "PDFファイルがアップロードされていません。";
    }
// public function convertPDFsToPNG()
// {
    // PDFファイルのリストを取得
    // $file_list = Storage::files('public');
// $pdfFiles = array_filter($file_list, function ($file) {
//     return pathinfo($file, PATHINFO_EXTENSION) === 'pdf';
// });

//   $pdfPath = 'app/storage/体温表.pdf';
//   $pngPath = 'app/storage/体温表.png';
//   $command = "gs -sDEVICE=pngalpha -o $pngPath $pdfPath";
// shell_exec($command);

    // foreach ($pdfFiles as $pdfFile) {
    //     // PDFファイルのフルパスを取得
    //     $pdfPath = storage_path('storage/' . $pdfFile);

    //     // 対応するPNGファイルのパスを生成（pathinfo 関数は、指定されたファイルパスからファイルに関する情報を取得するために使用　PATHINFO_FILENAME 定数は、ファイル名を表す情報を取得）
    //     $pngFile = pathinfo($pdfFile, PATHINFO_FILENAME) . '.png';
    //     $pngPath = storage_path('storage/' . $pngFile);

    //     // Ghostscriptコマンドを実行してPDFをPNGに変換
    //     $command = "gs -sDEVICE=pngalpha -o $pngPath $pdfPath";
    //     shell_exec($command);
    // }

//     return "PDFファイルをPNGに変換しました。";
// }
//         // // OCR付け足し↓
        // public function readPdf(Request $request)
        // {
        //     $uploadedFile = $request->file('file');
        //     $pdfContent = file_get_contents($uploadedFile->getRealPath());
        
        //     // Google Cloud Vision APIのクライアントを初期化
        //     $imageAnnotator = new ImageAnnotatorClient();
        
        //     try {
        //         // PDFファイルのテキストを抽出
        //         $image = $imageAnnotator->image($pdfContent, ['PDF_TEXT_DETECTION']);
        //         $annotation = $imageAnnotator->textDetection($image);
        //         $text = $annotation->text();
        
        //         return response()->json(['text' => $text]);
        //     } finally {
        //         $imageAnnotator->close();
        //     }
        // }
        
    //     public function processImage(Request $request)
    // {
    //     $vision = new VisionClient([
    //         'keyFile' => json_decode(file_get_contents('path/to/service-account-key.json'), true)
    //     ]);

    //     $image = $vision->image(file_get_contents('path/to/uploaded-pdf.pdf'), ['pdf']);
    //     $result = $vision->annotate($image);

    //     foreach ($result->text() as $text) {
    //         echo $text->description() . PHP_EOL;
    //     }
    // }
    
//   public function deleteFile($file_name)
//         {

// require 'vendor/autoload.php';

// $vision = new VisionClient([　　// Google Cloud Vision APIを使用するためのクライアントを作成します。ここでサービスアカウントキーを設定しています。
//     "keyFile" => json_decode(file_get_contents('path/to/service-account-key.json'), true)
// ]);

// $pdfFile = $_FILES['pdf']['tmp_name'];　 //リクエストのフォームデータからアップロードされたPDFファイルの一時ファイルへのパスを取得

// $image = $vision->image(file_get_contents($pdfFile), ['pdf']);　//Cloud Vision APIの image メソッドを使用して、PDFファイルを画像として読み込み、OCR処理の対象として指定
// $result = $vision->annotate($image);　//Cloud Vision APIを使用して画像からテキストを抽出し、結果を取得

// header('Content-Type: application/json');　 //レスポンスのコンテンツタイプをJSONに設定しています。　Content-Type→HTTPレスポンスの本文（コンテンツ）の種類を示す
// echo json_encode($result->text());

// }
}