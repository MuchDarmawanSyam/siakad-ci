<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_sekolah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tentang_model');
    }

    public function index() {
        $data['tentang_sekolah'] = $this->Tentang_model->tampil_data();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tentang_sekolah', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function edit($id) {
        $where = array('id_tentang' => $id);
        $data['tentang_sekolah'] = $this->Tentang_model->edit_data($where, 'tentang_sekolah')->row();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tentang_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update() {
        $id = $this->input->post('id_tentang');
        $sejarah = $this->input->post('sejarah');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');

        $data = array(
            'sejarah' => $sejarah,
            'visi' => $visi,
            'misi' => $misi
        );

        $where = array(
            'id_tentang' => $id
        );

        $this->Tentang_model->update_data($where, $data, 'tentang_sekolah');
        redirect('administrator/tentang_sekolah');
    }
}
?>
