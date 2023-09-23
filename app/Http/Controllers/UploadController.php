<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // アップロードしたファイルの情報を確認↓
        // dd($request->file('file'));
        
        
        // $request->file('file')->store('');
        
        // ファイル名をupload_file.pdfで保存↓
        // $request->file('file')->storeAs('','upload_file.pdf');
        
        // ファイル名をそのままで保存↓
        $file_name = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public',$file_name);
        
        // return view('upload');

}
}