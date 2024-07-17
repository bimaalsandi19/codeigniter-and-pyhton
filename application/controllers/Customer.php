<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Customer extends CI_Controller
{

    public $customer_m;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_m');
    }

    public function index($id)
    {
        $customer = $this->customer_m->get_project($id);
        if (!$customer) {
            // Tampilkan pesan kesalahan atau lakukan tindakan lain
            show_error('Data customer tidak ditemukan.', 404);
        }
        $data = [
            'customers' => $this->customer_m->get_all($id),
            'customer' => $customer
        ];
        $this->load->view('customer/index', $data);
    }

    public function show($id)
    {
        $data = [
            'customer' => $this->customer_m->get_by_id($id)
        ];
        $this->load->view('customer/show', $data);
    }


    public function download($id_project)
    {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Add data to the spreadsheet (e.g., $data is your Excel data)
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'ID');
        $spreadsheet->getActiveSheet()->setCellValue('B1', 'Name');
        $spreadsheet->getActiveSheet()->setCellValue('C1', 'Company');
        $spreadsheet->getActiveSheet()->setCellValue('D1', 'Basic Salary');
        $spreadsheet->getActiveSheet()->setCellValue('E1', 'Tunjangan 1');
        $spreadsheet->getActiveSheet()->setCellValue('F1', 'Tunjangan 2');
        $spreadsheet->getActiveSheet()->setCellValue('G1', 'Tunjangan 3');

        $customers = $this->customer_m->get_all($id_project);
        $row = 2;
        foreach ($customers as $customer) {
            $spreadsheet->getActiveSheet()->setCellValue('A' . $row, $customer->id_customer);
            $spreadsheet->getActiveSheet()->setCellValue('B' . $row, $customer->fname . ' ' . $customer->lname);
            $spreadsheet->getActiveSheet()->setCellValue('C' . $row, $customer->company);
            $spreadsheet->getActiveSheet()->setCellValue('D' . $row, $customer->basic_salary);
            $row++;
        }

        // Create a writer object
        $writer = new Xlsx($spreadsheet);

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Template ' . $customer->project_name . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Save the spreadsheet to php://output
        $writer->save('php://output');
        exit;
    }


    public function upload()
    {

        $this->load->view('customer/upload');
    }

    public function upload_proses()
    {
        $this->customer_m->upload();
        $output = exec('python application/python/main.py');
        redirect($_SERVER['HTTP_REFERER']);
        echo $output;
    }
}
