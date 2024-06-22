<?php
class Mapel_model extends CI_Model {
    
    public function tampil_data() {
        return $this->db->get('mapel')->result();
    }

    public function insert_data($data) {
        return $this->db->insert('mapel', $data);
    }

    public function edit_data($where) {
        return $this->db->get_where('mapel', $where);
    }

    public function update_data($where, $data) {
        $this->db->where($where);
        return $this->db->update('mapel', $data);
    }

    public function hapus_data($where) {
        $this->db->where($where);
        $this->db->delete('mapel');
    }

    public function ambil_kode_mapel($kode) {
        $result = $this->db->where('id_mapel', $kode)->get('mapel');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_detail_mapel($where) {
        return $this->db->where($where)->get('mapel')->result();
    }
}
?>
