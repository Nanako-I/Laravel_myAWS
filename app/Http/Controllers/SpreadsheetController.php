<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SpreadsheetController extends Controller
{
    
    // とびうおのコード↓
   public function chart()
    {
        $spreadsheet = new Spreadsheet();
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $writer->save('php://output');
    }
    
//     class SpreadsheetController extends Controller
// {
//     protected $spreadsheet;

    /**
     * 
     * @param PhpSpreadsheetService $spreadsheet
     * 
     * @return void
     */
    //  Qiitaの記事↓
//     // public function __construct(PhpSpreadsheetService $spreadsheet)
//     public function __construct(PhpSpreadsheet $spreadsheet)
//     {
//         $this->spreadsheet = $spreadsheet;
//     }
    
//     /**
//      * Excelダウンロードページを表示.
//      *
//      * @return View
//      */
//     public function index(): View
//     {
//         return view('index');
//     }

//     /**
//      * Excelファイルをダウンロード.
//      *
//      * @return View
//      */
//     public function download(): View
//     {
//         $this->spreadsheet->export();
//         return view('index');
//     }
}







