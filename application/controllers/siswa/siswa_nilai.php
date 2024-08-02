<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_nilai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('siswa_model');
        // Pastikan pengguna terautentikasi dan memiliki akses 'siswa'
        if (!$this->session->userdata('hak_akses') || $this->session->userdata('hak_akses') != 'siswa') {
            redirect('login'); // Redirect ke halaman login jika tidak berwenang
        }
    }

    public function index() {
        $idu = $this->session->userdata('nik'); // Ambil ID dari session
    
        // Ambil siswa berdasarkan ID pengguna
        $data['siswa'] = $this->siswa_model->ambil_kode_siswa($idu);
    
        // Tampilkan data ke view
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('siswa/siswa_nilai', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function show_nilai(){
        $nis = $this->input->post('nis');
        $kelas = $this->input->post('kelas');
        $smt = $this->input->post('smt');

        if ($kelas && $smt && $nis) {
            $data['nilai'] = $this->nilai_model->get_all_nilai_satu_siswa($nis, $kelas, $smt);
            $this->load->view('siswa/partials/ajax_nilai', $data);
        } else {
            echo '<tr><td colspan="5" class="text-center">Terjadi masalah.</td></tr>';
        }
    }
}
?>