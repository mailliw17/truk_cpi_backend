<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_scan extends CI_Controller
{
    //CONSTRUCT INI YANG MENGATASI SESSION LICIK
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->load->view('V_landingscan');
    }

    public function scan()
    {
        $this->load->view('V_scan');
    }

    public function scanmanual()
    {
        $judul['page_title'] = 'Form Scan';
        $this->load->view('templates/auth_header', $judul);
        $this->load->view('V_scanmanual');
        $this->load->view('templates/auth_footer');
    }

    public function coba()
    {
        $this->load->view('V_plattidakterdaftar');
    }

    public function inputmanual()
    {
        $this->load->model('M_truk');
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date("Y-m-d H:i:s");
        }
        $plat_nomor = $this->input->post('plat_nomor');

        $data['data_truk'] = $this->M_truk->getDataTruk2($plat_nomor);


        if ($data['data_truk'] == 0) {
            $this->session->set_flashdata('gagal', 'Gagal');
            redirect('C_scan/coba');
        }

        $data['truk'] = $data['data_truk']['id_truk'];
        $data['plat_nomor'] = $data['data_truk']['plat_nomor'];
        $data['jenis_truk'] = $data['data_truk']['jenis_truk'];
        $data['jenis_rute'] = $data['data_truk']['jenis_rute'];
        $data['waktu'] = $waktu;
        $judul['page_title'] = 'Form Input Manual Scan';
        $this->load->view('templates/auth_header', $judul);
        $this->load->view('V_formscan.php', $data);
        $this->load->view('templates/auth_footer');
    }

    public function formscan($id_truk)
    {
        $this->load->model('M_truk');
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date("Y-m-d H:i:s");
        }

        $data['data_truk'] = $this->M_truk->getDataTruk($id_truk);
        if ($data['data_truk'] == 0) {
            $this->session->set_flashdata('gagal', 'Gagal');
            redirect('C_scan/scan');
        } else {
            $this->session->set_flashdata('berhasil', 'Berhasil');
        }


        $data['truk'] = $id_truk;
        $data['plat_nomor'] = $data['data_truk']['plat_nomor'];
        $data['jenis_truk'] = $data['data_truk']['jenis_truk'];
        $data['jenis_rute'] = $data['data_truk']['jenis_rute'];
        $data['waktu'] = $waktu;
        $judul['page_title'] = 'Form Scan';
        $this->load->view('templates/auth_header', $judul);
        $this->load->view('V_formscan.php', $data);
        $this->load->view('templates/auth_footer');
    }

    public function formselesai()
    {
        //flash message
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Scan Truk dan Update Lokasi berhasil !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
      </div>');

        //setelah berhasil
        redirect('C_scan');
    }
}
