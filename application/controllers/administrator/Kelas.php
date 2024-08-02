<?php
class Kelas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['kelas'] = $this->Kelas_model->get_all_kelas();
        $data['tahun_ajaran'] = $this->Kelas_model->get_tahun_ajaran_aktif();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas', $data);
        $this->load->view('templates_administrator/footer');
    }
    
    public function tambah_kelas() {
        $data['tahun_ajaran'] = $this->Kelas_model->ambil_data_tahun_ajaran();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas_form', $data); // Pass data to view
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_kelas_aksi() {
        $this->_rules(); // Validasi form
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_kelas(); // Jika validasi gagal, kembali ke halaman tambah kelas
        } else {
            $kode_kelas = $this->input->post('kode_kelas');
            $nama_kelas = $this->input->post('nama_kelas');
            $id_tahun = $this->input->post('tahun_ajaran');
    
            $data = array(
                'kode_kelas' => $kode_kelas,
                'nama_kelas' => $nama_kelas,
                'id_tahun' => $id_tahun
            );
    
            if ($this->Kelas_model->insert_data($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data Kelas Berhasil Ditambahkan!
                    </div>');
                redirect('administrator/kelas'); // Redirect ke halaman daftar kelas setelah berhasil tambah
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal menambah data Kelas.
                    </div>');
                redirect('administrator/kelas/tambah_kelas'); // Redirect kembali ke halaman tambah kelas jika gagal
            }
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required'); // Ganti 'id_tahun' menjadi 'tahun_ajaran'
    }

    public function update($id) {
        $where = array('id_kelas' => $id);
        $data['kelas'] = $this->Kelas_model->edit_data($where, 'kelas')->result();
        $data['tahun_ajaran'] = $this->Kelas_model->ambil_data_tahun_ajaran();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas_update', $data); // Pass data to view
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi() {
        $id = $this->input->post('id_kelas');
        $kode_kelas = $this->input->post('kode_kelas');
        $nama_kelas = $this->input->post('nama_kelas');
        $id_tahun = $this->input->post('tahun_ajaran');
    
        $data = array(
            'kode_kelas' => $kode_kelas,
            'nama_kelas' => $nama_kelas,
            'id_tahun' => $id_tahun
        );
    
        $where = array(
            'id_kelas' => $id
        );
    
        $this->Kelas_model->update_data($where, $data, 'kelas');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data Kelas Berhasil diupdate!
                    </div>');
        redirect('administrator/kelas'); // Redirect ke halaman daftar kelas setelah berhasil update
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
        $this->load->model('siswa_model');
        $data['detail'] = $this->Kelas_model->detail_kelas($id); // Memanggil method detail_kelas dari model dengan parameter $id
        $data['siswa'] = $this->siswa_model->get_by_id_kelas($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas_detail', $data); // Menyertakan data detail ke dalam view
        $this->load->view('templates_administrator/footer');
    }

    
}
?>
