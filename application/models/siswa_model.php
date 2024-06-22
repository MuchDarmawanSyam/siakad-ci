<?php

class Siswa_model extends CI_Model {
    public function tampil_data($table) {
        return $this->db->get($table)->result();
    }
    
    public function ambil_kode_siswa($kode) {
        $result = $this->db->where('nis', $kode)->get('siswa');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function insert_data($data) {
        return $this->db->insert('siswa', $data);
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function hapus_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_siswa() {
        return $this->db->get('siswa')->result();
    }

    public $table = 'siswa';
    public $id = 'nis';

    public function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    public function get_by_id_kelas($id_kelas) {
        $this->db->where("id_kelas", $id_kelas);
        return $this->db->get($this->table)->result();
    }

    public function jumlah_siswa(){
        return $this->db->count_all('siswa');
    }
}
?>
