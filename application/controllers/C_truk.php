<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_truk extends CI_Controller
{

	//CONSTRUCT INI YANG MENGATASI SESSION LICIK
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('pagination');
		$this->load->model('M_truk');
	}

	public function data_truk()
	{
		$this->load->model('M_truk');

		//konfigurasi pagination
		$config['base_url'] = site_url('C_truk/data_truk'); //site url
		$config['total_rows'] = $this->db->count_all('tb_registrasitruk');
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//pagination style bootsrap
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//panggil fungsi  tampil_data_pagination pada model
		$data['data'] = $this->M_truk->tampil_data_pagination($config["per_page"], $data['page']);

		$data['pagination'] = $this->pagination->create_links();

		//load view
		$judul['page_title'] = 'Data Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_pagination', $data);
		$this->load->view('templates/footer');
	}

	public function index()
	{
		redirect('C_auth');
	}

	public function landingpage()
	{
		$this->load->view('V_landingpage');
	}

	public function tracking()
	{
		$this->load->model('M_truk');

		//konfigurasi pagination
		$config['base_url'] = site_url('C_truk/tracking'); //site url
		$config['total_rows'] = $this->db->count_all('tb_registrasitruk');
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//pagination style bootsrap
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		//panggil fungsi  tampil_data_pagination pada model
		$data['data'] = $this->M_truk->tampil_data_pagination($config["per_page"], $data['page']);

		$data['pagination'] = $this->pagination->create_links();

		$judul['page_title'] = 'Tracking Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_tracking2', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_truk($id_truk)
	{
		$where = array('id_truk' => $id_truk);

		//model 
		$this->M_truk->hapus_data($where, 'tb_registrasitruk');

		//flash message
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Truk Berhasil Dihapus!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>');

		//setelah berhasil
		redirect('C_truk/data_truk');
	}


	public function searchtracking()
	{
		$keyword = $this->input->post('keyword');
		$data['truk'] = $this->M_truk->get_keyword_tracking($keyword);

		//load tampilan
		$judul['page_title'] = 'Hasil Tracking Data Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_tracking', $data);
		$this->load->view('templates/footer');
	}


	public function searchdata()
	{
		$keyword = $this->input->post('keyword');
		$data['truk'] = $this->M_truk->get_keyword_data($keyword);

		//load tampilan
		$judul['page_title'] = 'Hasil Tracking Data Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_datatruk', $data);
		$this->load->view('templates/footer');
	}
	public function detail_truk($id_truk)
	{
		$this->load->model('M_truk');
		$detail = $this->M_truk->detail_data($id_truk);
		$data['detail'] = $detail;

		//load tampilan
		$judul['page_title'] = 'Detail Data Truk';
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_detail', $data);
		$this->load->view('templates/footer');
	}

	public function riwayat_truk($id_truk)
	{

		$this->load->model('M_truk');
		$detail = $this->M_truk->riwayat_truk($id_truk);
		$data['detail'] = $detail;

		// load tampilan
		$judul['page_title'] = 'Detail Data Truk 2';
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_riwayat', $data);
		$this->load->view('templates/footer');
	}

	//METHOD INI UNTUK MENYARING DATA BERDASARKAN TANGGAL DAN PENCARIAN
	//kalau mau print dan hapus, jangan lupa kirimkan $url nya
	public function laporan()
	{
		$data['page_title'] = 'Download Laporan';

		if ($this->input->get('keyword') != NULL) {
			//saat keyword ADA dan tanggal ADA
			if ($this->input->get('tanggal_awal') != NULL && $this->input->get('tanggal_akhir') != NULL) {

				$keyword = $this->input->get('keyword');
				$tanggal_awal = $this->input->get('tanggal_awal');
				$tanggal_akhir = $this->input->get('tanggal_akhir');
				$url_print = "C_truk/print_xls?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;

				$url_hapus = "C_truk/hapus?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;
			} else {
				//saat keyword ADA dan tanggal NULL
				$keyword = $this->input->get('keyword');
				$tanggal_awal = NULL;
				$tanggal_akhir = NULL;
				$url_print = "C_truk/print_xls?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;

				$url_hapus = "C_truk/hapus?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;
			}
		} else { //saat keyword NULL dan tanggal ADA
			$keyword = NULL;
			$tanggal_awal = $this->input->get('tanggal_awal');
			$tanggal_akhir = $this->input->get('tanggal_akhir');
			$url_print = "C_truk/print_xls?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;

			$url_hapus = "C_truk/hapus?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;
		}

		//saat keyword NULL dan tanggal NULL
		if ($this->input->get('tanggal_awal') == NULL && $this->input->get('tanggal_akhir') == NULL && $this->input->get('keyword') == NULL) {
			$keyword = NULL;
			$tanggal_awal = NULL;
			$tanggal_akhir = NULL;
			$url_print = "C_truk/print_xls";
			$url_hapus = "C_truk/hapus";
		}

		$url = base_url() . $url_print;
		$url1 = base_url() . $url_hapus;
		$data['url_print'] = $url;
		$data['url_hapus'] = $url1;
		$data['truk'] = $this->M_truk->getTampilDataTruk($keyword, $tanggal_awal, $tanggal_akhir);

		$data['page_title'] = 'Kelola Laporan';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('V_laporan', $data);
		$this->load->view('templates/footer');
	}

	//METHOD INI UNTUK MENYARING DATA BERDASARKAN TANGGAL DAN PENCARIAN
	//kalau mau print dan hapus, jangan lupa kirimkan $url nya
	public function laporan_superadmin()
	{
		$data['page_title'] = 'Download Laporan';

		if ($this->input->get('keyword') != NULL) {
			//saat keyword ADA dan tanggal ADA
			if ($this->input->get('tanggal_awal') != NULL && $this->input->get('tanggal_akhir') != NULL) {

				$keyword = $this->input->get('keyword');
				$tanggal_awal = $this->input->get('tanggal_awal');
				$tanggal_akhir = $this->input->get('tanggal_akhir');
				$url_print = "C_truk/print_xls?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;

				$url_hapus = "C_truk/hapus?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;
			} else {
				//saat keyword ADA dan tanggal NULL
				$keyword = $this->input->get('keyword');
				$tanggal_awal = NULL;
				$tanggal_akhir = NULL;
				$url_print = "C_truk/print_xls?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;

				$url_hapus = "C_truk/hapus?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;
			}
		} else { //saat keyword NULL dan tanggal ADA
			$keyword = NULL;
			$tanggal_awal = $this->input->get('tanggal_awal');
			$tanggal_akhir = $this->input->get('tanggal_akhir');
			$url_print = "C_truk/print_xls?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;

			$url_hapus = "C_truk/hapus?keyword=" . $keyword . "&tanggal_awal=" . $tanggal_awal . "&tanggal_akhir=" . $tanggal_akhir;
		}

		//saat keyword NULL dan tanggal NULL
		if ($this->input->get('tanggal_awal') == NULL && $this->input->get('tanggal_akhir') == NULL && $this->input->get('keyword') == NULL) {
			$keyword = NULL;
			$tanggal_awal = NULL;
			$tanggal_akhir = NULL;
			$url_print = "C_truk/print_xls";
			$url_hapus = "C_truk/hapus";
		}

		$url = base_url() . $url_print;
		$url1 = base_url() . $url_hapus;
		$data['url_print'] = $url;
		$data['url_hapus'] = $url1;
		$data['truk'] = $this->M_truk->getTampilDataTruk($keyword, $tanggal_awal, $tanggal_akhir);

		$data['page_title'] = 'Kelola Laporan';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('V_laporan_superadmin', $data);
		$this->load->view('templates/footer');
	}

	public function print_xls()
	{
		if ($this->input->get('keyword') != NULL) {
			if ($this->input->get('tanggal_awal') != NULL && $this->input->get('tanggal_akhir') != NULL) {

				$keyword = $this->input->get('keyword');
				$tanggal_awal = $this->input->get('tanggal_awal');
				$tanggal_akhir = $this->input->get('tanggal_akhir');
				$truk = $this->db->query("SELECT * FROM tb_timestamp WHERE (plat_nomor LIKE '%$keyword%' OR jenis_rute LIKE '%$keyword%') AND cp1 BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY plat_nomor DESC ")->result_array();
			} else {
				$keyword = $this->input->get('keyword');
				$tanggal_awal = NULL;
				$tanggal_akhir = NULL;
				$truk = $this->db->query("SELECT * FROM tb_timestamp WHERE plat_nomor LIKE '%$keyword%' OR jenis_rute LIKE '%$keyword%' ORDER BY plat_nomor DESC ")->result_array();
			}
		} else { //keyword nya NULL
			$keyword = NULL;
			$tanggal_awal = $this->input->get('tanggal_awal');
			$tanggal_akhir = $this->input->get('tanggal_akhir');
			$truk = $this->db->query("SELECT * FROM tb_timestamp WHERE cp1 BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY plat_nomor DESC ")->result_array();
		}
		if ($this->input->get('tanggal_awal') == NULL && $this->input->get('tanggal_akhir') == NULL && $this->input->get('keyword') == NULL) {
			$keyword = NULL;
			$tanggal_awal = NULL;
			$tanggal_akhir = NULL;
			$truk = $this->db->query("SELECT * FROM tb_timestamp ORDER BY plat_nomor ASC")->result_array();
		}

		$data['truk'] = $truk;
		//ini load ke excel yang akan terdownload
		//print nya kalau tidak di between tanggal juga sudah terkelompok order by
		$this->load->view('V_downloadexcel', $data);
	}

	public function hapus()
	{
		if ($this->input->get('keyword') != NULL) {
			if ($this->input->get('tanggal_awal') != NULL && $this->input->get('tanggal_akhir') != NULL) {
				//kalau keyword ADA dan tanggal ADA
				$keyword = $this->input->get('keyword');
				$tanggal_awal = $this->input->get('tanggal_awal');
				$tanggal_akhir = $this->input->get('tanggal_akhir');
				$this->db->query("DELETE FROM tb_timestamp WHERE (plat_nomor LIKE '%$keyword%' OR jenis_rute LIKE '%$keyword%') AND cp1 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
			} else {
				//Kalau keyword ADA dan tanggal NULL
				$keyword = $this->input->get('keyword');
				$tanggal_awal = NULL;
				$tanggal_akhir = NULL;
				$this->db->query("DELETE FROM tb_timestamp WHERE plat_nomor LIKE '%$keyword%' OR jenis_rute LIKE '%$keyword%'");
			}
		} else { //keyword nya NULL dan tanggal ADA
			$keyword = NULL;
			$tanggal_awal = $this->input->get('tanggal_awal');
			$tanggal_akhir = $this->input->get('tanggal_akhir');
			$this->db->query("DELETE FROM tb_timestamp WHERE cp1 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
		}
		if ($this->input->get('tanggal_awal') == NULL && $this->input->get('tanggal_akhir') == NULL && $this->input->get('keyword') == NULL) {
			//keyword NULL dan tanggal NULL
			$keyword = NULL;
			$tanggal_awal = NULL;
			$tanggal_akhir = NULL;
			$this->db->query("SELECT * FROM tb_timestamp ORDER BY plat_nomor,cp1 DESC ");
		}

		// $data['truk'] = $truk;
		//redirerct saat sudah selesai d hapus
		redirect('C_truk/laporan_superadmin');
	}

	public function role()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		//load tampilannya
		$judul['page_title'] = 'Kelola Akun';
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_role', $data);
		$this->load->view('templates/footer');
	}

	public function masukdata($id)
	{
		$this->load->model('M_truk');
		$checkpoint = $this->input->post('checkpoint');
		if (function_exists('date_default_timezone_set')) {
			date_default_timezone_set('Asia/Jakarta');
			$timestamp = date("Y-m-d H:i:s");
		}
		// $jenis_rute = $this->input->post('jenis_rute');
		$id_truk = $id;
		if ($checkpoint == 'cp1') {
			$ket_last = 'cp1';
			$this->db->query("UPDATE tb_registrasitruk SET cp1 ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE id_truk='$id_truk' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE id_truk='$id_truk' ");
		} elseif ($checkpoint == 'cp2') {
			$ket_last = 'cp2';
			$this->db->query("UPDATE tb_registrasitruk SET cp2 ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE id_truk='$id_truk' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE id_truk='$id_truk' ");
		} elseif ($checkpoint == 'cp3') {
			$ket_last = 'cp3';
			$this->db->query("UPDATE tb_registrasitruk SET cp3 ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE id_truk='$id_truk' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE id_truk='$id_truk' ");
		} elseif ($checkpoint == 'cp4') {
			$ket_last = 'cp4';
			$this->db->query("UPDATE tb_registrasitruk SET cp4 ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE id_truk='$id_truk' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE id_truk='$id_truk' ");
		} elseif ($checkpoint == 'cp5') {
			$ket_last = 'cp5';
			$this->db->query("UPDATE tb_registrasitruk SET cp5 ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE id_truk='$id_truk' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE id_truk='$id_truk' ");
		} elseif ($checkpoint == 'cp6') {
			$ket_last = 'cp6';
			$this->db->query("UPDATE tb_registrasitruk SET cp6 ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE id_truk='$id_truk' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE id_truk='$id_truk' ");
		} elseif ($checkpoint = 'cp_selesai') {
			$this->db->query("UPDATE tb_registrasitruk SET cp_selesai ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE id_truk='$id_truk' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE id_truk='$id_truk' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE id_truk='$id_truk' ");

			$data['data_truk'] = $this->M_truk->getDataTruk($id_truk);
			$plat_nomor = $data['data_truk']['plat_nomor'];
			$jenis_rute = $data['data_truk']['jenis_rute'];
			$cp1 = $data['data_truk']['cp1'];
			$cp2 = $data['data_truk']['cp2'];
			$cp3 = $data['data_truk']['cp3'];
			$cp4 = $data['data_truk']['cp4'];
			$cp5 = $data['data_truk']['cp5'];
			$cp6 = $data['data_truk']['cp6'];
			$cp_selesai = $data['data_truk']['cp_selesai'];
			$this->db->query("INSERT INTO tb_timestamp(id_truk, plat_nomor, jenis_rute, cp1, cp2, cp3, cp4, cp5, cp6, cp_selesai) VALUES('$id_truk', '$plat_nomor', '$jenis_rute', '$cp1', '$cp2', '$cp3', '$cp4', '$cp5','$cp6', '$cp_selesai' ) ");
		}
		redirect('C_scan/formselesai');
	}

	public function masukdatamanual($p)
	{
		$this->load->model('M_truk');
		$checkpoint = $this->input->post('checkpoint');
		if (function_exists('date_default_timezone_set')) {
			date_default_timezone_set('Asia/Jakarta');
			$timestamp = date("Y-m-d H:i:s");
		}
		// $jenis_rute = $this->input->post('jenis_rute');
		$plat_nomor = $p;
		if ($checkpoint == 'cp1') {
			$ket_last = 'cp1';
			$this->db->query("UPDATE tb_registrasitruk SET cp1 ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE plat_nomor='$plat_nomor' ");
		} elseif ($checkpoint == 'cp2') {
			$ket_last = 'cp2';
			$this->db->query("UPDATE tb_registrasitruk SET cp2 ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE plat_nomor='$plat_nomor' ");
		} elseif ($checkpoint == 'cp3') {
			$ket_last = 'cp3';
			$this->db->query("UPDATE tb_registrasitruk SET cp3 ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE plat_nomor='$plat_nomor' ");
		} elseif ($checkpoint == 'cp4') {
			$ket_last = 'cp4';
			$this->db->query("UPDATE tb_registrasitruk SET cp4 ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE plat_nomor='$plat_nomor' ");
		} elseif ($checkpoint == 'cp5') {
			$ket_last = 'cp5';
			$this->db->query("UPDATE tb_registrasitruk SET cp5 ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE plat_nomor='$plat_nomor' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE plat_nomor='$plat_nomor' ");
		} elseif ($checkpoint == 'cp6') {
			$ket_last = 'cp6';
			$this->db->query("UPDATE tb_registrasitruk SET cp6 ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE plat_nomor='$plat_nomor' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE plat_nomor='$plat_nomor' ");
		} elseif ($checkpoint = 'cp_selesai') {
			$this->db->query("UPDATE tb_registrasitruk SET cp_selesai ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET waktu_last ='$timestamp' WHERE plat_nomor='$plat_nomor' ");
			$this->db->query("UPDATE tb_registrasitruk SET checkpoint_last ='$ket_last' WHERE plat_nomor='$plat_nomor' ");
			// $this->db->query("UPDATE tb_registrasitruk SET jenis_rute ='$jenis_rute' WHERE plat_nomor='$plat_nomor' ");

			$data['data_truk'] = $this->M_truk->getDataTruk2($plat_nomor);
			$id_truk = $data['data_truk']['id_truk'];
			$jenis_rute = $data['data_truk']['jenis_rute'];
			$cp1 = $data['data_truk']['cp1'];
			$cp2 = $data['data_truk']['cp2'];
			$cp3 = $data['data_truk']['cp3'];
			$cp4 = $data['data_truk']['cp4'];
			$cp5 = $data['data_truk']['cp5'];
			$cp6 = $data['data_truk']['cp6'];
			$cp_selesai = $data['data_truk']['cp_selesai'];
			$this->db->query("INSERT INTO tb_timestamp(id_truk, plat_nomor, jenis_rute, cp1, cp2, cp3, cp4, cp5, cp6, cp_selesai) VALUES('$id_truk', '$plat_nomor', '$jenis_rute', '$cp1', '$cp2', '$cp3', '$cp4', '$cp5','$cp6', '$cp_selesai' ) ");
		}
		redirect('C_scan/formselesai');
	}

	public function checkpoint_cp1()
	{
		$judul['page_title'] = 'Checkpoint Pelabuhan / Gudang KM.13';
		$data['truk'] = $this->db->query("SELECT * FROM tb_max WHERE checkpoint_last ='cp1' ORDER BY waktu_last DESC")->result();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_checkpoint_cp1', $data);
		$this->load->view('templates/footer');
	}

	public function checkpoint_cp2()
	{
		$judul['page_title'] = 'Checkpoint Parkiran Pabrik';
		$data['truk'] = $this->db->query("SELECT * FROM tb_max WHERE checkpoint_last ='cp2' ORDER BY waktu_last DESC")->result();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_checkpoint_cp2', $data);
		$this->load->view('templates/footer');
	}

	public function checkpoint_cp3()
	{
		$judul['page_title'] = 'Checkpoint Sampling Center';
		$data['truk'] = $this->db->query("SELECT * FROM tb_max WHERE checkpoint_last ='cp3' ORDER BY waktu_last DESC ")->result();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_checkpoint_cp3', $data);
		$this->load->view('templates/footer');
	}

	public function checkpoint_cp4()
	{
		$judul['page_title'] = 'Checkpoint Truck Scale 1';
		$data['truk'] = $this->db->query("SELECT * FROM tb_max WHERE checkpoint_last ='cp4' ORDER BY waktu_last DESC")->result();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_checkpoint_cp4', $data);
		$this->load->view('templates/footer');
	}

	public function checkpoint_cp5()
	{
		$judul['page_title'] = 'Checkpoint Proses Bongkar';
		$data['truk'] = $this->db->query("SELECT * FROM tb_max WHERE checkpoint_last ='cp5' ORDER BY waktu_last DESC")->result();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_checkpoint_cp5', $data);
		$this->load->view('templates/footer');
	}

	public function checkpoint_cp6()
	{
		$judul['page_title'] = 'Checkpoint Truck Scale 2';
		$data['truk'] = $this->db->query("SELECT * FROM tb_max WHERE checkpoint_last ='cp6' ORDER BY waktu_last DESC")->result();
		$this->load->view('templates/header', $judul);
		$this->load->view('templates/sidebar');
		$this->load->view('V_checkpoint_cp6', $data);
		$this->load->view('templates/footer');
	}
}
