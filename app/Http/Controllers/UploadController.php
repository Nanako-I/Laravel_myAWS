<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// OCR付け足し↓
use Google\Cloud\Vision\V1\ImageAnnotatorClient;


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
    if ($request->hasFile('file')) {
        // ファイル名をそのままで保存
        $file_name = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public', $file_name);

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
            // ファイルを削除
            Storage::delete('public/' . $file_name);
        
            return response()->json(['message' => 'ファイルが削除されました']);
        }
        
        // // OCR付け足し↓
        public function readPdf(Request $request)
        {
            $uploadedFile = $request->file('file');
            $pdfContent = file_get_contents($uploadedFile->getRealPath());
        
            // Google Cloud Vision APIのクライアントを初期化
            $imageAnnotator = new ImageAnnotatorClient();
        
            try {
                // PDFファイルのテキストを抽出
                $image = $imageAnnotator->image($pdfContent, ['PDF_TEXT_DETECTION']);
                $annotation = $imageAnnotator->textDetection($image);
                $text = $annotation->text();
        
                return response()->json(['text' => $text]);
            } finally {
                $imageAnnotator->close();
            }
        }

}