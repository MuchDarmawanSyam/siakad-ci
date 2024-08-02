<?php
class Kelas_model extends CI_Model {

    public function tampil_data_guru() {
        $query = $this->db->get('guru');
        return $query->result();
    }

    public function get_all_kelas() {
        return $this->db->get('kelas')->result();
    }

    public function tampil_data() {
        $query = $this->db->get('kelas');
        return $query->result();
    }
    public function ambil_data_tahun_ajaran() {
        return $this->db->get('tahun_ajaran')->result();
    }
    public function get_tahun_ajaran_aktif() {
        $this->db->select('tahun_ajaran');
        $this->db->from('tahun_ajaran');
        $this->db->where('status', 'aktif');
        return $this->db->get()->row();
    }
    
    public function insert_data($data) {
        return $this->db->insert('kelas', $data);
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function delete_data($where) {
        $this->db->where($where);
        return $this->db->delete('kelas');
    }

    public function get_siswa_by_kelas($id_kelas) {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result(); // Return query result
        } else {
            return null; // Return null if no data found
        }
    }

    public $table = 'kelas';
    public $id = 'id_kelas';

    public function get_by_id($id){
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
    
    public function detail_kelas($id) {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('id_kelas', $id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result(); // Return query result
        } else {
            return null; // Return null if no data found
        }
    }
    
    // Function to get class data with wali kelas name
    public function get_wali_kelas() {
        $query = $this->db->get('kelas');
        return $query->result();
    }

    public function hapus_data_berdasarkan_nis($nis) {
        $this->db->where('nis', $nis);
        $this->db->delete('kelas');
    }

    public function jumlah_kelas(){
        return $this->db->count_all('kelas');
    }
    
}
?>
