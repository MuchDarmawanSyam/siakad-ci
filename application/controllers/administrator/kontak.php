<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('kontak_model');
    }

    public $table = 'kontak';
    public $id = 'id_kontak';

    public function index() {
        $data['kontak'] = $this->kontak_model->tampil_data($this->table);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kontak', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_kontak() {
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kontak_form');
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_kontak_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_kontak();
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'instagram' => $this->input->post('instagram'),
                'no_telp' => $this->input->post('no_telp')
            );

            $this->kontak_model->insert_data($data, $this->table);
            $this->session->set_flashdata('success', 'kontak berhasil ditambahkan');
            redirect('administrator/kontak');
        }
    }

    public function update($id) {
        $data['kontak'] = $this->kontak_model->get_by_id($this->table, $this->id, $id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kontak_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kontak'));
        } else {
            $id = $this->input->post('id_kontak');
            $data = array(
                'email' => $this->input->post('email'),
                'instagram' => $this->input->post('instagram'),
                'no_telp' => $this->input->post('no_telp')
            );

            $this->kontak_model->update_data($this->table, $this->id, $id, $data);
            $this->session->set_flashdata('success', 'kontak berhasil diperbarui');
            redirect('administrator/kontak');
        }
    }

    public function hapus($id) {
        $this->kontak_model->delete_data($this->table, $this->id, $id);
        $this->session->set_flashdata('success', 'kontak berhasil dihapus');
        redirect('administrator/kontak');
    }

    public function _rules() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('instagram', 'Judul kontak', 'required');
        $this->form_validation->set_rules('no_telp', 'Isi kontak', 'required');
    }
}
?>
