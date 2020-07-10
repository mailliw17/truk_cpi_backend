<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_superadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_truk');
    }

    public function landingpage()
    {
        $this->load->view('V_landingpage_superadmin');
    }

    public function hapus()
    {
        echo 'hello';
    }
}
