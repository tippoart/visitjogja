<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_visit extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    //singup
    public function save_user($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    //login
    public function login($username, $password)
    {
        $user = $this->db->get_where('user', array('username' => $username, 'pass'=> $password))->row();
    
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
    

    public function get_user_data($username)
    {
        $this->db->select('iduser'); 
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function get_admin_data($username)
    {
        $this->db->select('idadmin'); 
        $this->db->from('admin');
        $this->db->where('usernameadmin', $username);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function admin_login($username, $password)
    {

        $admin = $this->db->get_where('admin', array('usernameadmin' => $username, 'passadmin'=> $password))->row();
    
        if ($admin) {
            return true;
        } else {
            return false;
        }
    }



    //
    public function get_all_tabel()
    {
        $tables = array('admin', 'hubungi', 'komentar', 'user', 'wisata');
        $table_data = array();

        foreach ($tables as $table) {
            $table_data[$table]['name'] = $this->db->dbprefix($table);
            $table_data[$table]['total_rows'] = $this->db->count_all($table);
        }
        return $table_data;
    }

    public function get_data_wisata()
    {
        $query = $this->db->get('wisata');
        return $query->result();
    }
    //ubah data wisata
    public function ubah_wisata($idwisata)
    {
        $this->db->where('idwisata', $idwisata);
        $query = $this->db->get('wisata');
        return $query->row();
    }

    public function update_wisata($idwisata, $data)
    {
        $this->db->where('idwisata', $idwisata);
        $this->db->update('wisata', $data);
    }
    //


    public function get_data_user()
    {
        $query = $this->db->get('user');
        return $query->result();
    }
    public function get_data_admin()
    {
        $query = $this->db->get('admin');
        return $query->result();
    }

    //add data admin
    public function add_admin($data)
    {
        $this->db->insert('admin', $data);
        return $this->db->insert_id();
    }

    //delete data admin
    public function delete_admin($idadmin)
    {
        $this->db->where('idadmin', $idadmin);
        $this->db->delete('admin');
    }

    //update data admin
    public function ubah_admin($idadmin)
    {
        $this->db->where('idadmin', $idadmin);
        $query = $this->db->get('admin');
        return $query->row();
    }

    public function update_admin($idadmin, $data)
    {
        $this->db->where('idadmin', $idadmin);
        $this->db->update('admin', $data);
    }

    // komen 
    public function get_data_komen()
    {
        $this->db->select('komentar.*, user.username, wisata.judul as wisata_judul');
        $this->db->from('komentar');
        $this->db->join('user', 'komentar.iduser = user.iduser', 'left');
        $this->db->join('wisata', 'komentar.idwisata = wisata.idwisata', 'left');

        $query = $this->db->get();
        return $query->result();
    }


    public function tambah_komentar($data)
    {

        $this->db->insert('komentar', $data);
        return $this->db->insert_id();
    }

    public function delete_komen($idkomen)
    {
        $this->db->where('idkomen', $idkomen);
        $this->db->delete('komentar');
    }
    //

    public function add_user($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function delete_user($iduser)
    {
        $this->db->select('idkomen');
        $this->db->where('iduser', $iduser);
        $comments = $this->db->get('komentar')->result();

        foreach ($comments as $komen) {
            $this->db->where('idkomen', $komen->idkomen);
            $this->db->delete('komentar');
        }

        $this->db->where('iduser', $iduser);
        $this->db->delete('user');
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    

    public function ubah_user($iduser)
    {
        $this->db->where('iduser', $iduser);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function update_user($iduser, $data)
    {
        $this->db->where('iduser', $iduser);
        $this->db->update('user', $data);
    }

    //tambah data wisata
    public function get_data_wisata_admin()
    {

        $this->db->select('wisata.*, admin.usernameadmin');
        $this->db->from('wisata');
        $this->db->join('admin', 'wisata.idadmin = admin.idadmin', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function detail_wisata($idwisata)
{
    $this->db->select('wisata.*, admin.usernameadmin');
    $this->db->from('wisata');
    $this->db->join('admin', 'wisata.idadmin = admin.idadmin', 'left');
    $this->db->where('wisata.idwisata', $idwisata);
    $query = $this->db->get();
    return $query->row();
}

   
    

    public function tambahDataWisata($data)
    {
        $this->db->insert('wisata', $data);
        return $this->db->insert_id();
    }

    public function get_single_wisata($id_wisata)
    {

        $this->db->where('idwisata', $id_wisata);
        $query = $this->db->get('wisata');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function delete_data_wisata($idwisata)
    {
        $this->db->select('idkomen');
        $this->db->where('idwisata', $idwisata);
        $comments = $this->db->get('komentar')->result();

        foreach ($comments as $comment) {
            $this->db->where('idkomen', $comment->idkomen);
            $this->db->delete('komentar');
        }

        $this->db->where('idwisata', $idwisata);
        $this->db->delete('wisata');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }



    public function wisata_komen($idwisata)
    {
        $this->db->where('idwisata', $idwisata);
        $query = $this->db->get('komentar');

        return $query->num_rows() > 0;
    }


    //data hubungi

    public function data_hubungi() {
        $query = $this->db->get('hubungi');
        return $query->result();
    }

    public function tambah_data_hubungi($data) {
        $this->db->insert('hubungi', $data);
        return $this->db->insert_id();
    }

    public function hapus_data_hubungi($idhub) {
        $this->db->where('idhub', $idhub);
        return $this->db->delete('hubungi');
    }


}
