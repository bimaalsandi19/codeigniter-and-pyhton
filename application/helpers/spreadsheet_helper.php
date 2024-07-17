<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

function loadSpreadsheet($filePath)
{
    return IOFactory::load($filePath);
}

function createSpreadsheet()
{
    return new Spreadsheet();
}

function saveSpreadsheet($spreadsheet, $filePath)
{
    $writer = new Xlsx($spreadsheet);
    $writer->save($filePath);
}
