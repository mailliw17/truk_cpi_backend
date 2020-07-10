<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_updatetruk extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_edit');
        $this->load->library('form_validation');
    }


    public function edit_truk($id_truk)
    {
        // if (!isset($id_truk)) redirect('C_truk/data_truk');
        // $truk->$this->M_edit;
        // $validation = $this->form_validation;
        // $validation->set_rules($truk->rules());

        // if ($validation->run()) {
        //     $truk->update();
        //     $this->session->set_flashdata('succes', 'Data berhasil disimpan');
        // }

        // $data["truk"] = $truk->getById($id_truk);
        // if (!$data["truk"]) show_404();

        $where = array('id_truk' => $id_truk);
        $data['truk'] = $this->M_truk->edit_data($where, 'tb_registrasitruk')->result();

        //load tampilan
        $judul['page_title'] = 'Edit data truk';
        $this->load->view('templates/header', $judul);
        $this->load->view('templates/sidebar');
        $this->load->view('V_edit', $data);
        $this->load->view('templates/footer');
    }

    public function update_truk()

    {
        $id_truk = $this->input->post('id_truk');
        $plat_nomor = $this->input->post('plat_nomor');
        $jenis_truk = $this->input->post('jenis_truk');

        $this->M_truk->update_data($id_truk, $plat_nomor, $jenis_truk);

        //load tampilan
        // $judul['page_title'] = 'Edit data truk';
        // $this->load->view('templates/header');
        // $this->load->view('templates/sidebar');
        // $this->load->view('V_edit', $data);
        // $this->load->view('templates/footer');

        redirect('C_truk/data_truk/');
    }
}
