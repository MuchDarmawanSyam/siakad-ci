<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('identitas_model'); // Memuat model identitas_model
        $this->load->model('tentang_model'); // Memuat model identitas_model
        $this->load->model('informasi_model'); // Memuat model informasi_model
        $this->load->model('kontak_model'); // Memuat model kontak_model
        $this->load->model('iklan_model'); // Memuat model informasi_model
        $this->load->model('galeri_model'); // Memuat model informasi_model
    }

    public function index() {
        $data['identitas'] = $this->identitas_model->tampil_data('identitas');
        $data['tentang'] = $this->tentang_model->tampil_data('tentang');
        $data['informasi'] = $this->informasi_model->tampil_data('informasi');
        $data['iklan'] = $this->iklan_model->tampil_data('iklan');
        $data['galeri'] = $this->galeri_model->tampil_data('galeri');
        $data['kontak'] = $this->kontak_model->tampil_data('kontak');
        $this->load->view('templates_administrator/header');
        $this->load->view('landing_page', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function login() {
        $this->load->view('templates_administrator/header');
        $this->load->view('administrator/login');
        $this->load->view('templates_administrator/footer');
    }
}
?>
