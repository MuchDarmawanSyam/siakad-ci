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

    public function get_siswa_by_kelas($id_kelas, $id_tahun) {
        // Mengambil siswa berdasarkan id_kelas dan id_tahun dari tabel wali_kelas
        $this->db->select('wali_kelas.nis, siswa.nama_siswa');
        $this->db->from('wali_kelas');
        $this->db->join('siswa', 'siswa.nis = wali_kelas.nis');
        $this->db->where('wali_kelas.id_kelas', $id_kelas);
        $this->db->where('wali_kelas.id_tahun', $id_tahun);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
