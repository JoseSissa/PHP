<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$now = Carbon::now();
echo 'The date is ' . $now->toDateTimeString();


$spreadsheet = new Spreadsheet();

$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('A2', 'Jose');

$writer = new Xlsx($spreadsheet);
$fileName = 'docs\myExcel.xlsx';
$writer->save($fileName);

echo 'File saved';
