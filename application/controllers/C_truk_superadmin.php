<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_truk_superadmin extends CI_Controller
{

    //CONSTRUCT INI YANG MENGATASI SESSION LICIK
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('M_truk');
    }

    public function preview_hapus()
    {
        $data['page_title'] = 'Hapus Track Record';

        if ($this->input->get('tanggal_awal') != NULL && $this->input->get('tanggal_akhir') != NULL) {

            $tanggal_awal = $this->input->get('tanggal_awal');
            $tanggal_akhir = $this->input->get('tanggal_akhir');
            $url_print = "C_truk_superadmin/hapus?tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;
        }
        if ($this->input->get('tanggal_awal') == NULL && $this->input->get('tanggal_akhir') == NULL) {
            $tanggal_awal = NULL;
            $tanggal_akhir = NULL;
            $url_print = "C_truk_superadmin/hapus";
        }

        $url = base_url() . $url_print;
        $data['url'] = $url;
        $data['truk'] = $this->M_truk->getTampilDataTruk($tanggal_awal, $tanggal_akhir);

        //load view
        $this->load->view('templates/header_superadmin', $data);
        $this->load->view('templates/sidebar_superadmin');
        $this->load->view('V_preview_hapus', $data);
        $this->load->view('templates/footer');
    }
}
