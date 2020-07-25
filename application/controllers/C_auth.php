<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{
    //  VALIDASI LOGIN
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        //validasi login
        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Halaman Login';
            $this->load->view('templates/auth_header_login', $judul);
            $this->load->view('auth/V_login');
            $this->load->view('templates/auth_footer');
        } else {
            //kalau berhasil login
            $this->_login();
        }
    }

    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));

        $cek_user = $this->M_auth->auth_user($username, $password);
        // $cek_admin = $this->M_auth->auth_admin($username, $password);
        // $cek_barcoding = $this->M_auth->auth_barcoding($username, $password);
        // $cek_inputan = $this->M_auth->auth_inputan($username, $password);

        if ($cek_user->num_rows() != 0) {
            $data = $cek_user->row_array();
            $nama = $data['nama'];
            $username = $data['username'];
            $lokasi_pabrik = $data['lokasi_pabrik'];
            $lokasi_checkpoint = $data['lokasi_checkpoint'];
            $id = $data['id'];
            $role = $data['role'];
            $this->session->set_userdata('nama', $nama);
            $this->session->set_userdata('username', $username);
            $this->session->set_userdata('id', $id);
            $this->session->set_userdata('role', $role);
            $this->session->set_userdata('lokasi_pabrik', $lokasi_pabrik);
            $this->session->set_userdata('lokasi_checkpoint', $lokasi_checkpoint);
            $this->session->set_userdata('login', TRUE);
            if ($role == 'Super Admin') {
                redirect('C_truk/landingpage');
            } elseif ($role == 'Admin') {
                redirect('C_truk/landingpage');
            } elseif ($role == 'Barcoding') {
                redirect('C_scan');
            } elseif ($role == 'Inputan') {
                redirect('C_scan');
            }
        } else {
            $this->session->set_flashdata('gagal_login', 'Username / Password salah !');
            redirect('C_auth');
        }
    }


    //register operator yang barcode dan inputan
    public function registerminiadmin()
    {
        //form validasi by code igniter
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|is_unique[user.username]',
            array(
                'is_unique' => 'Username sudah terdaftar'
            )
        );

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //kalau gagal
        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Halaman Register';
            $this->load->view('templates/auth_header', $judul);
            $this->load->view('auth/V_registerminiadmin');
            $this->load->view('templates/auth_footer');
        } else {
            //kalau berhasil
            $role = '';
            if ($this->input->post('lokasi_checkpoint') == 'cp3' || $this->input->post('lokasi_checkpoint') == 'cp5') {
                $role = 'Inputan';
            } else {
                $role = 'Barcoding';
            }

            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => md5($this->input->post('password1', true)),
                'role' => $role,
                'date_created' => time(),
                'lokasi_pabrik' => htmlspecialchars($this->input->post('lokasi_pabrik', true)),
                'lokasi_checkpoint' => htmlspecialchars($this->input->post('lokasi_checkpoint', true))
            ];

            //insert ke database
            $this->db->insert('user', $data);

            //pindah ke halaman landingpage
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Operator Barcode baru berhasil dibuat !
            </div>');
            redirect('C_auth/index');
        }
    }

    //INI UDH GA GUNA, KARENA SUDAH ADA OTOMATISASI
    public function registerminiadmin2()
    {
        //form validasi by code igniter
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|is_unique[user.username]',
            array(
                'is_unique' => 'Username sudah terdaftar'
            )
        );

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //kalau gagal
        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Halaman Register';
            $this->load->view('templates/auth_header', $judul);
            $this->load->view('auth/V_registerminiadmin2');
            $this->load->view('templates/auth_footer');
        } else {
            //kalau berhasil
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => md5($this->input->post('password1', true)),
                'role' => 'Inputan',
                'date_created' => time()
            ];

            //insert ke database
            $this->db->insert('user', $data);

            //pindah ke halaman landingpage
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Operator Truck Scale baru berhasil dibuat !
            </div>');
            redirect('C_auth/index');
        }
    }

    public function registeradmin()
    {
        //form validasi by code igniter
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|is_unique[user.username]',
            array(
                'is_unique' => 'Username sudah terdaftar'
            )
        );

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //kalau gagal
        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Halaman Register';
            $this->load->view('templates/auth_header', $judul);
            $this->load->view('auth/V_registeradmin');
            $this->load->view('templates/auth_footer');
        } else {
            //kalau berhasil
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => md5($this->input->post('password1', true)),
                'role' => 'Admin',
                'date_created' => time()
            ];

            //insert ke database
            $this->db->insert('user', $data);

            //pindah ke halaman landingpage
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun ADMIN baru berhasil dibuat !
            </div>');
            redirect('C_auth/index');
        }
    }

    public function registersuperadmin()
    {
        //form validasi by code igniter
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules(
            'username',
            'Username',
            //[nama tabel.field]
            'trim|required|is_unique[user.username]',
            array(
                'is_unique' => 'Username sudah terdaftar'
            )
        );

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password tidak sama'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        //kalau gagal
        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Halaman Register';
            $this->load->view('templates/auth_header', $judul);
            $this->load->view('auth/V_registersuperadmin');
            $this->load->view('templates/auth_footer');
        } else {
            //kalau berhasil
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => md5($this->input->post('password1', true)),
                'role' => 'Super Admin',
                'date_created' => time()
            ];

            //insert ke database
            $this->db->insert('user', $data);

            //pindah ke halaman landingpage
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun SUPER ADMIN baru berhasil dibuat !
            </div>');
            redirect('C_auth/index');
        }
    }

    public function logout()
    {
        //bersihkan session dan kembalikan ke halaman login
        $this->session->sess_destroy();
        redirect('C_auth');

        //pindah ke halaman landingpage
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Kamu berhasil Logout!
       </div>');
        redirect('C_auth/index');
    }

    public function gantipassword()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('passwordLama', 'Password Lama', 'required|trim');

        $this->form_validation->set_rules('passwordBaru1', 'Password Baru 1', 'required|trim|matches[passwordBaru2]');

        $this->form_validation->set_rules('passwordBaru2', 'Password Baru 2', 'required|trim|matches[passwordBaru1]');
        if ($this->form_validation->run() == false) {
            //load tampilannya
            $judul['page_title'] = 'Ganti password';
            $this->load->view('templates/header', $judul);
            $this->load->view('templates/sidebar');
            $this->load->view('V_gantipassword', $data);
            $this->load->view('templates/footer');
        } else {
            //cek password lama apakah sama dengan yang di database
            $passwordLama = md5($this->input->post('passwordLama'));
            $passwordBaru1 = md5($this->input->post('passwordBaru1'));
            if ($passwordLama != $data['user']['password']) {
                //kalau password lama gasama dgn dengan db
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password lama Anda Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('C_auth/gantipassword');
            } else {
                //kalau password nya benar
                //cek dulu password baru sama tidak dengan password lama
                if ($passwordLama == $passwordBaru1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password baru tidak boleh sama dengan password lama!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('C_auth/gantipassword');
                } else {
                    //password sudah oke
                    $password_hash = md5($this->input->post('passwordBaru1', true));

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil diganti!
                    </div>');
                    redirect('C_auth');
                }
            }
        }
    }

    public function kelolaakun()
    {
        $data['user'] = $this->M_truk->get_user_data()->result();
        $judul['page_title'] = 'Kelola Akun';
        $this->load->view('templates/header', $judul);
        $this->load->view('templates/sidebar');
        $this->load->view('V_kelolaakun', $data);
        $this->load->view('templates/footer');
    }

    public function update_data($id)
    {
        $where = array('id' => $id);
        $data['user'] = $this->db->query("SELECT * FROM user WHERE id='$id'")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('V_updateakun', $data);
        $this->load->view('templates/footer');
    }

    public function update_data_aksi($id)
    {
        //form validasi by code igniter
        $where = array('id' => $id);
        $data['user'] = $this->db->query("SELECT * FROM user WHERE id='$id'")->result();
        $judul['page_title'] = 'Kelola Akun';
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        //kalau gagal
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $judul);
            $this->load->view('templates/sidebar');
            $this->load->view('V_updateakun', $data);
            $this->load->view('templates/footer');
        } else {
            //kalau berhasil
            $id = htmlspecialchars($this->input->post('id'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $username = htmlspecialchars($this->input->post('username'));
            $password = md5($this->input->post('password', true));

            $this->M_truk->update_akun_data($id, $nama, $username, $password);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Akun ini berhasil diperbarui !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('C_auth/kelolaakun');
        }
    }

    public function hapusakun($id)
    {
        $where = array('id' => $id);
        $this->M_truk->hapus_data($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-alert" role="alert">
            Data berhasil dihapus !
            </div>');
        redirect('C_auth/kelolaakun');
    }
}
