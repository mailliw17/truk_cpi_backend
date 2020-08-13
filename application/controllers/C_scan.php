<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_scan extends CI_Controller
{
    //CONSTRUCT INI YANG MENGATASI SESSION LICIK
    public function __construct()
    {
        parent::__construct();
        //tendang kalau blm login
        if ($this->session->userdata('login') != true) {
            redirect('C_auth');
        }
    }

    public function index()
    {
        $this->load->view('V_landingscan');
    }

    public function scan()
    {
        $this->load->view('V_scan_baru');
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
        $this->load->view('templates/header_error');
        $this->load->view('V_plattidakterdaftar');
    }

    //UNTUK TRUCK SCALE == SUDAH OTOMATISASI TANPA PILIH CP
    public function inputmanual()
    {
        $this->load->model('M_truk');
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date("Y-m-d H:i:s");
        }

        $lokasi_pabrik = $this->session->userdata('lokasi_pabrik');
        $lokasi_checkpoint = $this->session->userdata('lokasi_checkpoint');
        $plat_nomor = $this->input->post('plat_nomor');
        $data['data_truk'] = $this->M_truk->getDataTruk2($plat_nomor);


        //KALAU TRUK GA TERDAFTAR DI SISTEM
        if ($data['data_truk'] == 0) {
            $this->session->set_flashdata('gagal', 'Gagal');
            redirect('C_scan/coba');
        }

        //KALAU TERDAFTAR
        $this->db->query("UPDATE tb_registrasitruk SET $lokasi_checkpoint ='$waktu' WHERE plat_nomor='$plat_nomor' ");
        $this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$lokasi_checkpoint' WHERE plat_nomor='$plat_nomor' ");
        $this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$waktu' WHERE plat_nomor='$plat_nomor' ");
        $this->db->query("UPDATE tb_registrasitruk SET lokasi_pabrik ='$lokasi_pabrik' WHERE plat_nomor='$plat_nomor' ");

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

    //UNTUK BARCODING == SUDAH AUTOMATISASI TANPA INPUT
    public function formscan()
    {
        $id_truk = $this->input->post('id_truk');
        $this->load->model('M_truk');
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set('Asia/Jakarta');
            $waktu = date("Y-m-d H:i:s");
        }

        $lokasi_pabrik = $this->session->userdata('lokasi_pabrik');
        $lokasi_checkpoint = $this->session->userdata('lokasi_checkpoint');

        $this->db->query("UPDATE tb_registrasitruk SET $lokasi_checkpoint ='$waktu' WHERE id_truk='$id_truk' ");
        $this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$lokasi_checkpoint' WHERE id_truk='$id_truk' ");
        $this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$waktu' WHERE id_truk='$id_truk' ");
        $this->db->query("UPDATE tb_registrasitruk SET lokasi_pabrik ='$lokasi_pabrik' WHERE id_truk='$id_truk' ");

        $data['data_truk'] = $this->M_truk->getDataTruk($id_truk);
        if ($data['data_truk'] == 0) {
            // $this->session->set_flashdata('eeee', $id_truk); 
            $this->session->set_flashdata('gagal', 'Gagal');
            redirect('C_scan/scan');
        } else {
            $this->session->set_flashdata('berhasil', 'Berhasil');
        }
        //if udah masuk cp6
        if ($lokasi_checkpoint == 'cp6') {

            $id_truk = $data['data_truk']['id_truk'];
            $plat_nomor = $data['data_truk']['plat_nomor'];
            $jenis_rute = $data['data_truk']['jenis_rute'];
            $cp1 = $data['data_truk']['cp1'];
            $cp2 = $data['data_truk']['cp2'];
            $cp3 = $data['data_truk']['cp3'];
            $cp4 = $data['data_truk']['cp4'];
            $cp5 = $data['data_truk']['cp5'];
            $cp6 = $data['data_truk']['cp6'];

            $this->db->query("INSERT INTO tb_history(id_truk, plat_nomor, jenis_rute, lokasi_pabrik, cp1, cp2, cp3, cp4, cp5, cp6) VALUES('$id_truk', '$plat_nomor', '$jenis_rute', '$lokasi_pabrik', '$cp1', '$cp2', '$cp3', '$cp4', '$cp5', '$cp6') ");
        }

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
