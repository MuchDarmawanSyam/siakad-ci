<?php
class Kelas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['kelas'] = $this->Kelas_model->get_wali_kelas();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas', $data);
        $this->load->view('templates_administrator/footer');
    }
    
    public function tambah_kelas() {
        $data = array(); // Definisikan $data sebagai array kosong
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas_form', $data); // Pass data to view
        $this->load->view('templates_administrator/footer');
    }
    

    public function tambah_kelas_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_kelas();
        } else {
            $kode_kelas = $this->input->post('kode_kelas');
            $nama_kelas = $this->input->post('nama_kelas');

            $data = array(
                'kode_kelas' => $kode_kelas,
                'nama_kelas' => $nama_kelas,
          
            );

            if ($this->Kelas_model->insert_data($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data Kelas Berhasil Ditambahkan!
                    </div>');
                redirect('administrator/kelas');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal menambah data Kelas.
                    </div>');
                redirect('administrator/kelas/tambah_kelas');
            }
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
    }

    public function update($id) {
        $where = array('id_kelas' => $id);
        $data['kelas'] = $this->Kelas_model->edit_data($where, 'kelas')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas_update', $data); // Pass data to view
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi() {
        $id = $this->input->post('id_kelas');
        $kode_kelas = $this->input->post('kode_kelas');
        $nama_kelas = $this->input->post('nama_kelas');
   

        $data = array(
            'kode_kelas' => $kode_kelas,
            'nama_kelas' => $nama_kelas,
           
        );

        $where = array(
            'id_kelas' => $id
        );

        $this->Kelas_model->update_data($where, $data, 'kelas');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data Kelas Berhasil diupdate!
                    </div>');
        redirect('administrator/kelas');
    }
    public function delete($id) {
        $where = array('id_kelas' => $id);
        $this->Kelas_model->delete_data($where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Data Kelas Berhasil dihapus!
                    </div>');
        redirect('administrator/kelas');
    }
    
    // Fungsi tambahan untuk mendapatkan data kelas beserta nama 
    public function get_wali_kelas() {
        $data['kelas'] = $this->Kelas_model->get_wali_kelas();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas', $data);
        $this->load->view('templates_administrator/footer');
    }
    
    public function detail_kelas($id) {
        $data['detail'] = $this->Kelas_model->detail_kelas($id); // Memanggil method detail_kelas dari model dengan parameter $id
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas_detail', $data); // Menyertakan data detail ke dalam view
        $this->load->view('templates_administrator/footer');
    }
}
?>
