    <!-- application/models/Nilai_model.php -->

    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Nilai_model extends CI_Model {

        // Ambil semua kelas
        public function get_all_kelas() {
            $this->db->select('*');
            $this->db->from('kelas');
            $query = $this->db->get();
            return $query->result();
        }

        // Ambil tahun ajaran aktif
        public function get_tahun_ajaran_aktif() {
            $this->db->select('*');
            $this->db->from('tahun_ajaran');
            $this->db->where('status', 'aktif');
            $query = $this->db->get();
            return $query->row();
        }

        // Ambil kelas berdasarkan ID
        public function get_kelas_by_id($id_kelas) {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->where('id_kelas', $id_kelas);
            $query = $this->db->get();
            return $query->row();
        }

        // Ambil data nilai berdasarkan kelas dan tahun ajaran
        public function baca_nilai($id_kelas, $id_tahun) {
            $this->db->select('nilai.*, siswa.nis, siswa.nama_siswa');
            $this->db->from('nilai');
            $this->db->join('siswa', 'nilai.nis = siswa.nis');
            $this->db->where('nilai.id_kelas', $id_kelas);
            $this->db->where('nilai.id_tahun', $id_tahun);
            $query = $this->db->get();
            return $query->result();
        }

        // Ambil tahun ajaran berdasarkan ID
        public function get_tahun_ajaran_by_id($id_tahun) {
            $this->db->select('*');
            $this->db->from('tahun_ajaran');
            $this->db->where('id_tahun', $id_tahun);
            $query = $this->db->get();
            return $query->row();
        }
        public function get_mata_pelajaran_guru($id_kelas, $id_tahun) {
            $this->db->select('mengajar.id_mengajar, mapel.nama_mapel, guru.nama_guru');
            $this->db->from('mengajar');
            $this->db->join('mapel', 'mengajar.id_mapel = mapel.id_mapel');
            $this->db->join('guru', 'mengajar.nik = guru.nik');
            $this->db->where('mengajar.id_kelas', $id_kelas);
            $this->db->where('mengajar.id_tahun', $id_tahun);
            $query = $this->db->get();
            return $query->result();
        }
    }
    ?>
