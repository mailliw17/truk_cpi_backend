<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_auth extends CI_Controller
{

    //  VALIDASI LOGIN
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        //validasi login
        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $judul);
            $this->load->view('auth/V_login');
            $this->load->view('templates/auth_footer');
        } else {
            //kalau berhasil login
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //query ke database untuk melihat email dan password yang sesuai
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //cek passwordnya bener atau tidak
            if (password_verify($password, $user['password'])) {
                //kalau password benar

                //siapkan data dalam session
                $data = [
                    'email' => $user['email'],
                    'nama' => $user['nama'],
                    'role_id' => $user['role_id']
                ];

                //simpan ke dalam session 
                $this->session->set_userdata($data);
                if ($user['role_id'] == 2) {
                    //ARAHKAN KE ADMIN DULU
                    redirect('C_truk/landingpage');
                } elseif ($user['role_id'] == 3) {
                    //masuk ke miniadmin
                    redirect('C_scan');
                } elseif ($user['role_id'] == 1) {
                    //untuk super admin role 1
                    redirect('C_truk/landingpage');
                } elseif ($user['role_id'] == 4) {
                    //untuk miniadmin2 atau operator truck scale
                    redirect('C_scan');
                }
            } else {
                //kalau password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password anda salah!
                </div>');
                redirect('C_auth/index');
            }
        } else {
            //gaada user dengan email itu
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar
            </div>');
            redirect('C_auth/index');
        }
    }

    //register mini admin
    public function registerminiadmin()
    {
        //form validasi by code igniter
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah pernah dipakai untuk registrasi'
        ]);

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
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'date_created' => time()
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

    //register mini admin 2 atau operator truck scale
    public function registerminiadmin2()
    {
        //form validasi by code igniter
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah pernah dipakai untuk registrasi'
        ]);

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
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 4,
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

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah pernah dipakai untuk registrasi'
        ]);

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
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
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

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah pernah dipakai untuk registrasi'
        ]);

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
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
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
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        //pindah ke halaman landingpage
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Kamu berhasil Logout!
       </div>');
        redirect('C_auth/index');
    }

    public function gantipassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

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
            $passwordLama = $this->input->post('passwordLama');
            $passwordBaru1 = $this->input->post('passwordBaru1');
            if (!password_verify($passwordLama, $data['user']['password'])) {
                //kalau password lama gasama dgn dengan db
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password lama Anda Salah!
                </div>');
                redirect('C_auth/gantipassword');
            } else {
                //kalau password nya benar
                //cek dulu password baru sama tidak dengan password lama
                if ($passwordLama == $passwordBaru1) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan password lama!
                    </div>');
                    redirect('C_auth/gantipassword');
                } else {
                    //password sudah oke
                    $password_hash = password_hash($passwordBaru1, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil diganti!
                    </div>');
                    redirect('C_auth/gantipassword');
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

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
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
            $email = htmlspecialchars($this->input->post('email'));
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $this->M_truk->update_akun_data($id, $nama, $email, $password);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Akun ini berhasil diperbarui !
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
