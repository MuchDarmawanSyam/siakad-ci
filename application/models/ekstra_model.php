<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstra_model extends CI_Model {

    public function tampil_data() {
        return $this->db->get('ekstra')->result();
    }

    public function get_data_guru($nik = '') {
        if (!empty($nik)) {
            return $this->db->get_where('guru', array('nik' => $nik))->row();
        } else {
            return $this->db->get('guru')->result();
        }
    }

    public function insert_ekstra($data) {
        // Hapus 'nis' dari $data jika tidak ada di form
        if (isset($data['nis'])) {
            unset($data['nis']);
        }
        // Masukkan data ke tabel 'ekstra'
        $this->db->insert('ekstra', $data);
    }

    public function get_active_tahun_ajaran() {
        $this->db->where('status', 'Aktif');
        return $this->db->get('tahun_ajaran')->row();
    }

    public function edit_data($id) {
        return $this->db->get_where('ekstra', array('id_ekstra' => $id))->row();
    }

    public function update_data($where, $data) {
        $this->db->where($where);
        $this->db->update('ekstra', $data);
    }

    public function delete_ekstra($id) {
        $this->db->where('id_ekstra', $id);
        $this->db->delete('ekstra');
    }

    public function tambah_siswa_ekstra($id_ekstra, $nis) {
        // Tambahkan siswa ke ekstrakurikuler
        $data = array(
            'id_ekstra' => $id_ekstra,
            'nis' => $nis
        );
        return $this->db->insert('ekstra_siswa', $data);
    }

    public function get_siswa_by_kelas() {
        $id_kelas = $this->input->post('id_kelas');
        $siswa_list = $this->Siswa_model->get_siswa_by_kelas($id_kelas);
        echo json_encode($siswa_list);
    }

    public function tambah_siswa_aksi($id_ekstra) {
        $nis = $this->input->post('nis');
        // Validasi input
        if (!$nis) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pilih siswa yang akan ditambahkan!</div>');
            redirect('administrator/ekstra/tambah_siswa/' . $id_ekstra);
        }
        // Tambahkan siswa ke ekstrakurikuler
        $result = $this->tambah_siswa_ekstra($id_ekstra, $nis);
        // Set pesan sesuai hasil penambahan
        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Siswa berhasil ditambahkan ke ekstrakurikuler!</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal menambahkan siswa ke ekstrakurikuler!</div>');
        }
        redirect('administrator/ekstra/daftar_siswa/' . $id_ekstra);
    }

    public function get_siswa_by_kelas_id($kelas_id) {
        $this->db->select('siswa.nama_siswa, siswa.jenis_kelamin, siswa.alamat, kelas.nama_kelas');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
        $this->db->where('siswa.id_kelas', $kelas_id);
        $query = $this->db->get();
        return $query->result();
    }        

    public function get_data_kelas() {
        return $this->db->get('kelas')->result();
    }

    public function insert_ekstra_siswa($data) {
        $this->db->insert('ekstra_siswa', $data);
    }

    public function get_siswa_by_ekstra_id($id_ekstra) {
        $this->db->select('siswa.nis, siswa.nama_siswa, siswa.jenis_kelamin, siswa.alamat');
        $this->db->from('ekstra'); // Mengubah dari 'ekstra_siswa' menjadi 'ekstra'
        $this->db->join('siswa', 'ekstra.nis = siswa.nis');
        $this->db->where('ekstra.id_ekstra', $id_ekstra);
        return $this->db->get()->result();
    }

    public function get_ekstra_by_id($id) {
        $this->db->select('ekstra.*, guru.nama_guru, kelas.nama_kelas, tahun_ajaran.tahun_ajaran');
        $this->db->from('ekstra');
        $this->db->join('guru', 'ekstra.nik = guru.nik', 'left');
        $this->db->join('kelas', 'ekstra.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('tahun_ajaran', 'ekstra.id_tahun = tahun_ajaran.id_tahun', 'left');
        $this->db->where('ekstra.id_ekstra', $id);
        return $this->db->get()->row();
    }
    public function get_kelas_by_id($id_kelas) {
        return $this->db->get_where('kelas', array('id_kelas' => $id_kelas))->row();
    }
    public function get_tahun_ajaran_by_id($id_tahun) {
        return $this->db->get_where('tahun_ajaran', array('id_tahun' => $id_tahun))->row();
    }
    public function hapus_siswa($id_ekstra, $nis) {
        // Cek apakah entri dengan 'nis' yang diberikan ada di tabel 'ekstra'
        $cek_data = $this->db->get_where('ekstra', array('id_ekstra' => $id_ekstra, 'nis' => $nis))->row();
    
        if ($cek_data) {
            // Hapus entri data 'nis' dari tabel 'ekstra'
            $this->db->where('id_ekstra', $id_ekstra);
            $this->db->where('nis', $nis);
            $this->db->delete('ekstra');
            return $this->db->affected_rows() > 0;
        } else {
            return false; // Jika entri 'nis' tidak ditemukan, tidak ada yang dihapus
        }    
    
    }
}
