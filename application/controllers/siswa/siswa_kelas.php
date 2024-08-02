<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_kelas extends CI_Controller {

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
    
        // Ambil data kelas dan siswa berdasarkan ID pengguna
        $data = $this->siswa_model->get_kelas_by_id_siswa($idu);
    
        // Tampilkan data ke view
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('siswa/siswa_kelas', $data);
        $this->load->view('templates_administrator/footer');
    }
}
?>
