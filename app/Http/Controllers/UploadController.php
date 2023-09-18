<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){
    //   upload.blade.phpを表示させる↓
    	return view('upload');
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