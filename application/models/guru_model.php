<?php
class Guru_model extends CI_Model {

    public function tampil_data($table)
    {
        return $this->db->get($table)->result(); // Tambahkan tanda semicolon (;) di akhir return statement
    }

    public function ambil_kode_guru($id)
    {
        $result = $this->db->where('nik', $id)->get('guru');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function insert_data($data) {
        return $this->db->insert('guru', $data);
    }

    public function edit_data($where,$table) {
        return $this->db->get_where($table, $where) ;
    }

    public function update_data($where, $data,$table) {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function hapus_data ($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public $table = 'guru';
    public $id = 'nik';

    public function get_by_id($id){
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
}
