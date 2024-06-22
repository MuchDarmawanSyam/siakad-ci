<?php
class Guru extends CI_Controller {

    public function index() {
        $this->load->model('guru_model'); // Memuat model guru_model
        $data['guru'] = $this->guru_model->tampil_data('guru'); // Memanggil metode tampil_data dari model guru_model
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function detail($id) {
        $where = array('nik' => $id);
        $data['detail'] = $this->guru_model->ambil_kode_guru($id); // Perbaikan parameter yang dilewatkan ke edit_data
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru_detail', $data); // Mengganti view yang dipanggil
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_guru() {
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru_form');
        $this->load->view('templates_administrator/footer');
    }
    
    public function tambah_guru_aksi() {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_guru();
        } else {
            $nik = $this->input->post('nik');
            $nama_guru = $this->input->post('nama_guru');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $email = $this->input->post('email');
            $agama = $this->input->post('agama');
            $no_telp = $this->input->post('no_telp');
            $foto = $this->input->post('foto');
            // Set idu sama dengan nik
            $idu = $nik;
    
            $data = array(
                'nik' => $nik,
                'nama_guru' => $nama_guru,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'email' => $email,
                'agama' => $agama,
                'no_telp' => $no_telp,
                'foto' => $foto,
                'idu' => $idu // Attribut idu diisi dengan nilai dari nik
            );
    
            if ($this->guru_model->insert_data($data)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data guru Berhasil Ditambahkan!
                    </div>');
                redirect('administrator/guru'); // Redirect kembali ke halaman tabel guru setelah data terinput
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal menambah data guru.
                    </div>');
                redirect('administrator/guru/tambah_guru'); // Jika gagal, tetap di halaman tambah guru
            }
        }
    }
    
    
    public function _rules() {
        $this->form_validation->set_rules('nik', 'Nomor Induk Guru', 'required');
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Harus di isi!']);
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email Harus di isi!']);
    }
    public function update($id) {
        $where = array('nik' => $id);
        $data['guru'] = $this->guru_model->ambil_kode_guru($id); // Menggunakan method ambil_kode_guru dari model
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/guru_update', $data);
        $this->load->view('templates_administrator/footer');
    }
    
    public function update_aksi() {
        $id = $this->input->post('nik');
        $nama_guru = $this->input->post('nama_guru');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $email = $this->input->post('email');
        $agama = $this->input->post('agama');
        $foto = $this->input->post('foto');
        $no_telp = $this->input->post('no_telp');
        
        // Set idu sama dengan nik
        $idu = $id;
    
        $data = array(
            'nama_guru' => $nama_guru,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'email' => $email,
            'agama' => $agama,
            'foto' => $foto,
            'no_telp' => $no_telp,
            'idu' => $idu // Set idu sama dengan nik
        );
    
        $where = array(
            'nik' => $id
        );
    
        if ($this->guru_model->update_data($where, $data, 'guru')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data guru Berhasil diupdate!
                </div>');
            redirect('administrator/guru');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gagal mengupdate data guru.
                </div>');
            redirect('administrator/guru');
        }
    }
    
    
    
    public function delete($id) {
        $where = array('nis' => $id);
        $this->guru_model->hapus_data($where,'guru');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data guru Berhasil dihapus!
                </div>');
        redirect('administrator/guru');
    }
}

?>
