<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('guru_model');
    }

    public function index(){
        $data['data_pengguna'] = $this->user_model->get_all();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah(){
        $data['data_guru'] = $this->guru_model->tampil_data('guru');

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_aksi(){
        $data['idu'] = $this->input->post('guru');
        $data['username'] = $this->input->post('username');
        $data['password'] = md5($data['username']); // Password defaultnya username itu sendiri
        $data['email'] = $this->input->post('email');
        $data['hak_akses'] = 'guru';
        $data['blokir'] = 'N';

        if($this->user_model->cek_duplikat_pengguna($data['idu'])){
            if ($this->user_model->tambah_pengguna($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Penguna Berhasil Ditambahkan!
                </div>');
                redirect('administrator/user');
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Penguna Gagal Ditambahkan!
                </div>');
                redirect('administrator/user/tambah');
            }
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Penguna Sudah Ada!
                </div>');
                redirect('administrator/user/tambah');
        }
    }

}