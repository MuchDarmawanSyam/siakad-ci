<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ekstra_model');
        $this->load->model('Guru_model');
        $this->load->model('Kelas_model');
        $this->load->library('session');
    }

    public function index() {
        $data['ekstra'] = $this->Ekstra_model->tampil_data();
        $data['tahun_ajaran'] = $this->Ekstra_model->get_active_tahun_ajaran();
        foreach ($data['ekstra'] as $ek) {
            $guru = $this->Ekstra_model->get_data_guru($ek->nik);
            if (is_object($guru)) {
                $ek->nama_guru = $guru->nama_guru;
            } else {
                $ek->nama_guru = 'Belum ditentukan';
            }
        }
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/ekstra', $data);
        $this->load->view('templates_administrator/footer');
    }
    

    public function tambah() {
        $data['guru_list'] = $this->Ekstra_model->get_data_guru();
        $data['kelas_list'] = $this->Ekstra_model->get_data_kelas();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/ekstra_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_aksi() {
        $nama_ekstra = $this->input->post('nama_ekstra');
        $deskripsi = $this->input->post('deskripsi');
        $nik = $this->input->post('guru');
        $id_kelas = $this->input->post('kelas');
        $tahun_ajaran = $this->Ekstra_model->get_active_tahun_ajaran();

        if ($nama_ekstra && $deskripsi && $nik && $id_kelas && $tahun_ajaran) {
            $data = array(
                'nama_ekstra' => $nama_ekstra,
                'deskripsi' => $deskripsi,
                'nik' => $nik,
                'id_kelas' => $id_kelas,
                'id_tahun' => $tahun_ajaran->id_tahun,
            );

            $this->Ekstra_model->insert_ekstra($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data ekstra berhasil ditambahkan!</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Semua field harus diisi!</div>');
        }

        redirect('administrator/ekstra');
    }

    public function update($id) {
        $data['ekstra'] = $this->Ekstra_model->edit_data($id);
        $data['guru_list'] = $this->Ekstra_model->get_data_guru();
        $data['kelas_list'] = $this->Ekstra_model->get_data_kelas();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/ekstra_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi() {
        $id = $this->input->post('id_ekstra');
        $nama_ekstra = $this->input->post('nama_ekstra');
        $deskripsi = $this->input->post('deskripsi');
        $nik = $this->input->post('guru');
        $id_kelas = $this->input->post('kelas');
        $tahun_ajaran = $this->Ekstra_model->get_active_tahun_ajaran();

        if ($id && $nama_ekstra && $deskripsi && $nik && $id_kelas && $tahun_ajaran) {
            $data = array(
                'nama_ekstra' => $nama_ekstra,
                'deskripsi' => $deskripsi,
                'nik' => $nik,
                'id_kelas' => $id_kelas,
                'id_tahun' => $tahun_ajaran->id_tahun,
            );

            $where = array('id_ekstra' => $id);

            $this->Ekstra_model->update_data($where, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data ekstra berhasil diupdate!</div>');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Semua field harus diisi!</div>');
        }

        redirect('administrator/ekstra');
    }

    public function delete($id) {
        $this->Ekstra_model->delete_ekstra($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data ekstra berhasil dihapus!</div>');
        redirect('administrator/ekstra');
    }

    public function daftar_siswa($id_ekstra) {
        $data['ekstra'] = $this->Ekstra_model->ambil_detail_ekstra($id_ekstra);
        $data['siswa_list'] = $this->Ekstra_model->get_siswa_by_ekstra_id($id_ekstra); // Mengubah dari 'get_siswa_by_ekstra_id' menjadi 'get_siswa_by_kelas_id'
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/ekstra_daftar_siswa', $data);
        $this->load->view('templates_administrator/footer');
    } public function detail($id_ekstra) {
    $data['detail'] = $this->Ekstra_model->get_ekstra_by_id($id_ekstra);
    $data['siswa'] = $this->Ekstra_model->get_siswa_by_ekstra_id($id_ekstra); // Mengubah dari 'get_siswa_by_ekstra_id' menjadi 'get_siswa_by_kelas_id'
    $data['guru'] = $this->Ekstra_model->get_data_guru($data['detail']->nik);
    $data['kelas'] = $this->Ekstra_model->get_kelas_by_id($data['detail']->id_kelas);
    $data['tahun_ajaran'] = $this->Ekstra_model->get_tahun_ajaran_by_id($data['detail']->id_tahun);
    $this->load->view('templates_administrator/header');
    $this->load->view('templates_administrator/sidebar');
    $this->load->view('administrator/ekstra_detail', $data);
    $this->load->view('templates_administrator/footer');
}

public function hapus_siswa($id_ekstra) {
    $nis = $this->input->get('nis'); // Mendapatkan nilai 'nis' dari query string

    if (!empty($nis)) {
        if ($this->Ekstra_model->hapus_siswa($id_ekstra, $nis)) {
            $this->session->set_flashdata('message', 'Siswa berhasil dihapus dari ekstrakurikuler');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus siswa dari ekstrakurikuler');
        }
    } else {
        $this->session->set_flashdata('message', 'NIS kosong, tidak ada yang dihapus');
    }

    redirect('administrator/ekstra/detail/' . $id_ekstra);
}

}
