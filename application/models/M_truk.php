<?php

class M_truk extends CI_Model
{
    public function get_user_data()
    {
        $this->db->where('role_id', 3);
        $this->db->or_where('role_id', 4);
        return $this->db->get('user');
    }

    public function tampil_data()
    {
        // memanggil nama tabel
        return $this->db->get('tb_registrasitruk');
    }

    public function tampil_data_pagination($limit, $start)
    {
        $query = $this->db->get('tb_registrasitruk', $limit, $start);
        return $query;
    }

    public function input_data($data)
    {
        $this->db->insert('tb_registrasitruk', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($id_truk, $plat_nomor, $jenis_truk)
    {
        $this->db->query("UPDATE tb_registrasitruk SET plat_nomor='$plat_nomor', jenis_truk='$jenis_truk' WHERE id_truk='$id_truk'");
    }

    public function update_akun_data($id, $nama, $email, $password)
    {
        $this->db->query("UPDATE user SET nama='$nama', email='$email', password='$password' WHERE id='$id'");
    }

    public function get_keyword_tracking($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_registrasitruk');
        // $this->db->like('id_truk', $keyword);
        $this->db->or_like('plat_nomor', $keyword);
        $this->db->or_like('jenis_truk', $keyword);
        $this->db->or_like('jenis_rute', $keyword);
        return $this->db->get()->result();
    }

    public function get_keyword_data($keyword)
    {
        $this->db->select('*');
        $this->db->from('tb_registrasitruk');
        $this->db->like('id_truk', $keyword);
        $this->db->or_like('plat_nomor', $keyword);
        $this->db->or_like('jenis_truk', $keyword);
        $this->db->or_like('jenis_rute', $keyword);
        return $this->db->get()->result();
    }

    public function detail_data($id_truk)
    {
        $query = $this->db->get_where('tb_registrasitruk', array('id_truk' => $id_truk))->row();
        return $query;
    }

    public function riwayat_truk($id_truk)
    {
        // $query = $this->db->get_where('tb_timestamp', array('id_truk' => $id_truk))->result();
        // $query = $this->db->query("SELECT * FROM `tb_timestamp` ORDER BY cp1 DESC WHERE id_truk = '$id_truk'")->result();
        $query = $this->db->order_by('cp1 DESC');
        $query = $this->db->limit('30');
        $query = $this->db->get_where('tb_timestamp', ['id_truk' => $id_truk])->result();
        return $query;
    }

    public function print_laporan()
    {
        return $this->db->get('tb_registrasitruk')->result();
    }

    public function getDataTruk($id)
    {
        return $this->db->get_where('tb_registrasitruk', array('id_truk' => $id))->row_array();
    }

    public function getDataTruk2($p)
    {
        return $this->db->get_where('tb_registrasitruk', array('plat_nomor' => $p))->row_array();
    }

    public function hitungSemuaTruk()
    {
        return $this->db->get('tb_registrasitruk')->num_rows();
    }

    public function print_excel()
    {
        $this->db->query('SELECT * FROM tb_timestamp DESC LIMIT 5');
        // $this->db->from('tb_timestamp');

        return $this->db->get();
    }

    // arti NULL dalam parameter itu artinya inputannya boleh NULL
    public function getTampilDataTruk($keyword = NULL, $tanggal_awal = NULL, $tanggal_akhir = NULL)
    {
        if ($keyword) {
            //keyword ADA dan tanggal ADA
            if (($tanggal_awal) && ($tanggal_akhir)) {
                return $this->db->query("SELECT * FROM tb_timestamp WHERE (plat_nomor LIKE '%$keyword%' OR jenis_rute LIKE '%$keyword%') AND cp1 BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY cp1 DESC")->result_array();
            } else {
                //keyword ADA dan tanggal NULL
                return $this->db->query("SELECT * FROM tb_timestamp WHERE plat_nomor LIKE '%$keyword%' OR jenis_rute LIKE '%$keyword%' ORDER BY cp1 DESC")->result_array();
            }
        } else {
            //keyword NULL dan tanggal NULL
            $this->db->select('*');
            $this->db->from('tb_timestamp');

            if (!($keyword)) {
                //keyword NULL dan tanggal ADA
                if (($tanggal_awal) && ($tanggal_akhir)) {
                    $this->db->where("cp1 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                }
            }
            $this->db->order_by('cp1', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
        // //kalau ada isi dari keyword
        // if ($keyword) {
        //     //kalau ada isi dari tanggal
        //     if (($tanggal_awal) && ($tanggal_akhir)) {

        //         $this->db->where("cp1 BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY plat_nomor, cp1 DESC", NULL, TRUE);
        //         // $this->db->where("cp2 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'", NULL, TRUE);
        //         // $this->db->where("cp3 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'", NULL, TRUE);
        //         // $this->db->where("cp4 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'", NULL, TRUE);
        //         // $this->db->where("cp5 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'", NULL, TRUE);
        //         // $this->db->where("cp6 BETWEEN '$tanggal_awal' AND '$tanggal_akhir'", NULL, TRUE);
        //         // $this->db->where("cp_akhir BETWEEN '$tanggal_awal' AND '$tanggal_akhir'", NULL, TRUE);
        //     }
        // }
        // //kalau kosongan
        // $this->db->order_by('cp1', 'DESC');
        // return $this->db->get('tb_timestamp')->result_array();
    }

    public function kelolauser_data()
    {
        return $this->db->get('user');
    }
}
