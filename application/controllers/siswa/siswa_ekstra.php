<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_ekstra extends CI_Controller {

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
    
        // Ambil data ekstra siswa berdasarkan ID pengguna
        $data['ekstra'] = $this->ekstra_model->get_all_ekstra_siswa_by_nis($idu);
    
        // Tampilkan data ke view
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('siswa/siswa_ekstra', $data);
        $this->load->view('templates_administrator/footer');
    }
}
?>