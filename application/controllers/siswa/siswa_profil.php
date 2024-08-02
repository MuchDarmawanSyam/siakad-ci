<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Siswa_model');
    }

    public function index() {
        $data['detail'] = $this->Siswa_model->get_detail_by_username($this->session->userdata('username'));

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('siswa/siswa_profil', $data);
        $this->load->view('templates_administrator/footer');
    }
}
?>
