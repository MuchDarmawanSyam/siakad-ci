<?php
class Rombel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_kelas_asal($id_tahun) {
        // Mengambil id_kelas dan nama_kelas dari tabel wali_kelas sesuai dengan tahun ajaran aktif
        $this->db->select('wali_kelas.id_kelas, kelas.nama_kelas');
        $this->db->from('wali_kelas');
        $this->db->join('kelas', 'kelas.id_kelas = wali_kelas.id_kelas');
        $this->db->where('wali_kelas.id_tahun', $id_tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_active_year() {
        // Mendapatkan tahun ajaran aktif dari tabel tahun_ajaran
        $this->db->select('*');
        $this->db->from('tahun_ajaran');
        $this->db->where('status', 'aktif');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_siswa_by_kelas($id_kelas) {
        $this->db->select('siswa.nis, siswa.nama_siswa');
        $this->db->from('siswa');
        $this->db->where('siswa.id_kelas', $id_kelas);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_siswa_by_nis($nis, $data){
        $this->db->where('nis', $nis);
        $this->db->update('siswa', $data);
    }
}
?>
