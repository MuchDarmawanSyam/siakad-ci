    <!-- application/models/Nilai_model.php -->

    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Nilai_model extends CI_Model {

        // Simpan nilai siswa
        public function save_nilai($data){
            $this->db->insert('nilai', $data);
        }

        // Update nilai siswa
        public function update_nilai($data, $id_nilai){
            $this->db->where('id_nilai', $id_nilai);
            $this->db->update('nilai', $data);
        }

        // Ambil data nilai berdasarkan id mengajar
        public function get_nilai_by_id_mengajar($id_mengajar){
            $this->db->select('*');
            $this->db->from('nilai');
            $this->db->where('id_mengajar', $id_mengajar);
            $query = $this->db->get();
            return $query->result();
        }

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

        // Ambil semua data siswa berdasarkab id dan id kelas
        public function get_siswa_by_id_ngajar_id_kelas($id_mengajar, $id_kelas){
            $this->db->select('siswa.nis, siswa.nama_siswa');
            // $this->db->select('siswa.nis, siswa.nama_siswa, mengajar.id_kelas');
            // $this->db->from('siswa, mengajar');
            $this->db->from('siswa, mengajar');
            $this->db->where('mengajar.id_mengajar', $id_mengajar);
            $this->db->where('siswa.id_kelas', $id_kelas);
            $query = $this->db->get();
            return $query->result();
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

        // Ambil tahun ajaran berdasarkan ID mengajar
        public function get_tahun_ajaran_by_id_mengajar($id_mengajar) {
            $this->db->select('tahun_ajaran.id_tahun, tahun_ajaran.tahun_ajaran');
            $this->db->from('tahun_ajaran, mengajar');
            $this->db->where('mengajar.id_mengajar', $id_mengajar);
            $query = $this->db->get();
            return $query->row();
        }

        // Ambil nilai kkm berdasarkan id mengajar
        public function get_kkm_by_id_mengajar($id_mengajar){
            $this->db->select('mengajar.kkm');
            $this->db->from('mengajar');
            $this->db->where('mengajar.id_mengajar', $id_mengajar);
            $query = $this->db->get();
            return $query->row();
        }

        public function get_mata_pelajaran_guru_by_id_mengajar($id_mengajar) {
            $this->db->select('mengajar.id_mengajar, mapel.nama_mapel, guru.nama_guru');
            $this->db->from('mengajar');
            $this->db->join('mapel', 'mengajar.id_mapel = mapel.id_mapel');
            $this->db->join('guru', 'mengajar.nik = guru.nik');
            $this->db->where('mengajar.id_mengajar', $id_mengajar);
            $query = $this->db->get();
            return $query->result();
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
