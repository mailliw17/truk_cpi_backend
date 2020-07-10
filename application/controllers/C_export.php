<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/third_party/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_truk');
    }

    // public function printpertruk()
    // {
    // $this->load->model('M_truk');
    // $data['truk'] = $this->M_truk->tampil_data()->result();

    // $detail = $this->M_truk->detail_data($id_truk);
    // $data['detail'] = $detail;

    //load tampilan
    //     $this->load->view('V_printpertruk');
    // }

    public function index()
    {
        $data['truk'] = $this->M_truk->print_excel()->result();
        $this->load->view('V_printpertruk', $data);
    }

    public function export()
    {
        $truk = $this->M_truk->print_excel()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'LAPORAN TRACKING TRUK SBM & LANGSIR')
            ->setCellValue('A2', 'PT. Charoen Pokphand Indonesia')
            ->setCellValue('A3', 'Periode : ')

            ->setCellValue('A5', 'No')
            ->setCellValue('B5', 'Plat Nomor')
            ->setCellValue('C5', 'Jenis Rute')
            ->setCellValue('D5', 'Pelabuhan / Gudang KM.13')
            ->setCellValue('E5', 'Parkiran Pabrik')
            ->setCellValue('F5', 'Sampling Center')
            ->setCellValue('G5', 'Truck Scale 1')
            ->setCellValue('H5', 'Proses Bongkar')
            ->setCellValue('I5', 'Truck Scale 2');

        $kolom = 6;
        $nomor = 1;
        foreach ($truk as $t) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $t->plat_nomor)
                ->setCellValue('C' . $kolom, $t->jenis_rute)
                ->setCellValue('D' . $kolom, $t->cp1)
                ->setCellValue('E' . $kolom, $t->cp2)
                ->setCellValue('F' . $kolom, $t->cp3)
                ->setCellValue('G' . $kolom, $t->cp4)
                ->setCellValue('H' . $kolom, $t->cp5)
                ->setCellValue('I' . $kolom, $t->cp6);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Laporan Truk.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
