<?php

namespace app\excel;
// Interfaces
use app\interfaces\ExcelInterface;
// Libraries
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CreatorExcel implements ExcelInterface
{
    public function create(array $data, string $filePath)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $headers = ['ID', 'Name', 'Alcohol'];
        $sheet->fromArray($headers, null, 'A1');
        $sheet->fromArray($data, null, 'A2');
        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);
    }
}
