<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Illuminate\Support\Facades\DB;

class SpreadsheetController extends Controller
{
    
    // とびうおのコード↓
   public function chart()
    {
       $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        
          // データベースから名前を取得
        $people = DB::table('people')->orderBy('person_name')->get();

        $sheet->setCellValue('A1', '体温記録表');
        // $sheet->setCellValue('A3', '日付');
        $sheet->setCellValue('A3', date('Y年', strtotime('today'))); // 今日の年を表示
        $sheet->setCellValue('B3', date('n月', strtotime('today'))); // 今日の月を表示
        $sheet->setCellValue('C3', date('j日', strtotime('today'))); // 今日の日を表示
        $sheet->setCellValue('A4', '氏名');
        $sheet->setCellValue('B4', '時刻');
        $sheet->setCellValue('C4', '体温');
        $sheet->setCellValue('D4', '症状');
        $sheet->setCellValue('D5', '特になし');
        $sheet->setCellValue('I4', '顔色');
        $sheet->setCellValue('K4', '・備考');
        
        

        $writer = new Xlsx($spreadsheet);

        $fileName = '検温表.xlsx';
        ob_clean(); // 既存の出力をクリア
    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. $fileName .'"');
        header('Cache-Control: max-age=0');
        
        // 名前をスプレッドシートにセット
        $row = 5;
        foreach ($people as $person) {
        $sheet->setCellValue('A' . $row, $person->person_name);
        
        $sheet->setCellValue('D' . $row, '特になし');
        $sheet->setCellValue('E' . $row, '・咳'); // 咳をセット
        $sheet->setCellValue('F' . $row, '鼻水');
        $sheet->setCellValue('G' . $row, '・咽頭痛');
        $sheet->setCellValue('H' . $row, '・頭痛');
        $sheet->setCellValue('I' . $row, 'よい');
        $sheet->setCellValue('J' . $row, '・悪い');

        $row++;
        
        };
                $styleArray = [
                  'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];
        // 罫線をひく↓
        // $sheet->getStyle('A3:K25')->applyFromArray($styleArray);
        $sheet->getStyle('A3:K' . ($row - 1))->applyFromArray($styleArray);
        
         // 罫線を削除↓
        $cellRange = 'D3:K3'; // 削除対象のセル範囲
        $sheet->getStyle($cellRange)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_NONE);


        // セルの結合↓
        $sheet->mergeCells('D4:H4'); 
        $sheet->mergeCells('I4:J4'); 
        
        // セルの幅↓
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(46);
        
        // $spreadsheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal

        $writer->save('php://output'); // download file 
        exit(); // スクリプトを終了して余分な出力を防ぐ

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








