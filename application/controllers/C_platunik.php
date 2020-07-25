<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_platunik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function tambah_truk()
    {
        $this->form_validation->set_rules('plat_nomor', 'Plat Nomor', 'trim|is_unique[tb_registrasitruk.plat_nomor]', [

            'is_unique' => 'Plat nomor ini sudah ter-registrasi'
        ]);

        //kalau gagal
        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Data Truk';
            $this->load->view('templates/header', $judul);
            $this->load->view('templates/sidebar'); 
            $this->load->view('V_platunik');
            $this->load->view('templates/footer');
        } else {
            //kalau berhasil
            $data = [
                'plat_nomor' => htmlspecialchars($this->input->post('plat_nomor', true)),
                'jenis_truk' => htmlspecialchars($this->input->post('jenis_truk', true)),
                'jenis_rute' => htmlspecialchars($this->input->post('jenis_rute', true))
            ];

            //ubah jadi array
            // $data = array(
            //     'plat_nomor' => $plat_nomor,
            //     'jenis_truk' => $jenis_truk
            // );

            //inputan data
            $this->M_truk->input_data($data, 'tb_registrasitruk');

            //flash message
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Truk Baru Berhasil Ditambahkan!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');
            //setelah berhasil
            redirect('C_truk/data_truk');
        }
    }
}
