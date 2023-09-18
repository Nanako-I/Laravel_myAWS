<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;

class SpreadsheetController extends Controller
{
    
    // とびうおのコード↓
   public function chart()
    {
       $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', '体温記録表');
        $sheet->setCellValue('A3', '日付');
        $sheet->setCellValue('B3', '月');
        $sheet->setCellValue('C3', '日');
        $sheet->setCellValue('A4', '氏名');
        $sheet->setCellValue('B4', '時刻');
        $sheet->setCellValue('C4', '体温');
        $sheet->setCellValue('D4', '症状');
        $sheet->setCellValue('D5', '特になし');
        $sheet->setCellValue('E5', '・咳');
        $sheet->setCellValue('F5', '・鼻水');
        $sheet->setCellValue('G5', '・咽頭痛');
        $sheet->setCellValue('H5', '・頭痛');
        $sheet->setCellValue('I4', '顔色');
        $sheet->setCellValue('I5', 'よい');
        $sheet->setCellValue('J5', '・悪い');
        $sheet->setCellValue('K4', '・備考');

        $writer = new Xlsx($spreadsheet);

        $fileName = 'example.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName .'"');
        header('Cache-Control: max-age=0');
        
                $styleArray = [
                  'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];
        // 罫線をひく↓
        $sheet->getStyle('A3:K25')->applyFromArray($styleArray);
        
        

        // セルの結合↓
        $sheet->mergeCells('D4:H4'); 
        $sheet->mergeCells('I4:J4'); 
        
        // セルの幅↓
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth(46);
        
        // $spreadsheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal

        $writer->save('php://output'); // download file 
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







