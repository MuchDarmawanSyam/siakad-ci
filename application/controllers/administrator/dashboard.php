<?php

class Dashboard extends CI_Controller{

    function __construct(){
        parent::__construct();

        if(!isset($this->session->userdata['username'])){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Anda Belum Login!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
          redirect('administrator/auth');
        }
    }
    
    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'username' => $data->username,
            'hak_akses' => $data->hak_akses,
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('templates_administrator/footer');
    }
}   
