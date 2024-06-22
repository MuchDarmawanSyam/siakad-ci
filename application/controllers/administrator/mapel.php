<?php
class Mapel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mapel_model'); // Mengubah 'Mapel_model' menjadi huruf kecil untuk sesuai dengan standar penamaan file model
        $this->load->library('form_validation'); // Memuat library form_validation
    }
    
    public function index() {
        $data['mapel'] = $this->Mapel_model->tampil_data('mapel');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel', $data);
        $this->load->view('templates_administrator/footer');
    }
    
    public function tambah_mapel() {
        $data = array(); // Definisikan variabel $data sebagai array kosong
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel_form', $data); // Menyertakan data daftar ke dalam view
        $this->load->view('templates_administrator/footer');
    }
    
    
    public function tambah_mapel_aksi() {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mapel();
        } else {
            $kode_mapel = $this->input->post('kode_mapel');
            $nama_mapel = $this->input->post('nama_mapel');
            $deskripsi = $this->input->post('deskripsi');
    
            $data = array(
                'kode_mapel' => $kode_mapel,
                'nama_mapel' => $nama_mapel,
                'deskripsi' => $deskripsi,
            );
    
            if ($this->Mapel_model->insert_data($data)) { // Memperbaiki nama model
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data mapel Berhasil Ditambahkan!
                    </div>');
                redirect('administrator/mapel');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal menambah data mapel.
                    </div>');
                redirect('administrator/mapel/tambah');
            }
        }
    }
    
    public function _rules() {
        $this->form_validation->set_rules('kode_mapel', 'Kode mapel', 'required');
        $this->form_validation->set_rules('nama_mapel', 'Nama mapel', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => 'Deskripsi Mata Pelajaran Harus di isi!']);
    }
    
    
    public function update($id) {
        $where = array('id_mapel' => $id);
        $data['mapel'] = $this->Mapel_model->edit_data($where, 'mapel')->result(); // Perbaikan parameter yang dilewatkan ke edit_data
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi() {
        $id = $this->input->post('id_mapel'); // Memperbaiki variabel id menjadi id_mapel
        $kode_mapel = $this->input->post('kode_mapel');
        $nama_mapel = $this->input->post('nama_mapel');
        $deskripsi = $this->input->post('deskripsi');


        $data = array(
            'kode_mapel' => $kode_mapel,
            'nama_mapel' => $nama_mapel,
            'deskripsi' => $deskripsi,
        );

        $where = array(
            'id_mapel' => $id
        );

        if ($this->Mapel_model->update_data($where, $data, 'mapel')) { // Memperbaiki pemanggilan method update_data
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Mata Pelajaran Berhasil diupdate!
                </div>');
            redirect('administrator/mapel');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gagal mengupdate data Mata Pelajaran.
                </div>');
            redirect('administrator/mapel');
        }
    }
     
    public function delete($id) {
        $where = array('id_mapel' => $id);
        $this->Mapel_model->hapus_data($where,'mapel');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Mata Pelajaran Berhasil dihapus!
                </div>');
        redirect('administrator/mapel');
    }
    
    public function detail($id) {
        $where = array('id_mapel' => $id);
        $data['detail'] = $this->Mapel_model->get_detail_mapel($where); // Menggunakan method get_detail_mapel untuk mengambil detail mata pelajaran
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel_detail', $data);
        $this->load->view('templates_administrator/footer');
    }
    
    
}
?>
