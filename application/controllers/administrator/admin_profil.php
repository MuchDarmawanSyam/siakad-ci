<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Guru_model'); // Assuming you use Guru_model for admin
    }

    public function index() {
        $data['detail'] = $this->Guru_model->get_detail_by_username($this->session->userdata('username'));

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/admin_profil', $data);
        $this->load->view('templates_administrator/footer');
    }
}
?>
