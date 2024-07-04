<?php
class Siswa extends CI_Controller {
    public function index() {
        $data['siswa'] = $this->siswa_model->get_siswa();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail($id) {
        $where = array('nis' => $id);
        $data['detail'] = $this->siswa_model->ambil_kode_siswa($id); // Menggunakan method ambil_kode_siswa dari model
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_detail', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_siswa() {
        $this->load->model('kelas_model');
        $this->load->model('tahun_model');
        $data['siswa'] = $this->siswa_model->get_siswa();
        $data['kelas'] = $this->kelas_model->get_all_kelas();
        $data['tahun'] = $this->tahun_model->get_tahun_aktif();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_form', $data); 
        $this->load->view('templates_administrator/footer');
    }
    
    public function tambah_siswa_aksi() {
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_siswa();
        } else {
            $this->load->model('rombel_model');
            $nis = $this->input->post('nis');
            $nama_siswa = $this->input->post('nama_siswa');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $email = $this->input->post('email');
            $agama = $this->input->post('agama');
            $nama_ayah = $this->input->post('nama_ayah');
            $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
            $kelas = $this->input->post('id_kelas');
            $tahun = $this->input->post('tahun');
            $nama_ibu = $this->input->post('nama_ibu');
            $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
            $foto = $this->input->post('foto');
            $no_telp = $this->input->post('no_telp');
    
    
            // Isi idu dengan nilai nis
            $idu = $nis;
    
            // Membuat konfigurasi untuk upload file
            $config['upload_path']          = './assets/uploads/img/siswa/';
            $config['allowed_types']        = 'jpg|jpeg';
            $config['max_size']             = 5024;
            $config['overwrite']             = TRUE;
            $config['file_name']             = 'Siswa-'.$nis;
            // Memuat modul bawaaan ci untuk mengangani upload file
            $this->load->library('upload', $config);
            
            // Validasi apakah nis yg ditambahkan sdh ada
            if ($nis == $this->siswa_model->ambil_kode_siswa($nis)[0]->nis){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                            Siswa dengan NIS: <b>'.$nis.'</b> sudah terdaftar.
                            </div>');
                redirect('administrator/siswa/tambah_siswa');
            }else{
                if(!isset($_FILES['foto']) || $_FILES['foto']['error'] == UPLOAD_ERR_NO_FILE) {
                    // Jika melakukan tambah data tanpa update foto
                    $data = array(
                        'nis' => $nis,
                        'nama_siswa' => $nama_siswa,
                        'alamat' => $alamat,
                        'jenis_kelamin' => $jenis_kelamin,
                        'tempat_lahir' => $tempat_lahir,
                        'tgl_lahir' => $tgl_lahir,
                        'email' => $email,
                        'agama' => $agama,
                        'nama_ayah' => $nama_ayah,
                        'pekerjaan_ayah' => $pekerjaan_ayah,
                        'nama_ibu' => $nama_ibu,
                        'pekerjaan_ibu' => $pekerjaan_ibu,
                        'foto' => $foto,
                        'no_telp' => $no_telp,
                        'idu' => $idu // Isi idu dengan nilai nis
                    );

                    if ($this->siswa_model->insert_data($data)) {
                        $data_rombel = [
                            'nis' => $nis,
                            'id_kelas' => $kelas,
                            'id_tahun' => $tahun
                        ];
                        $this->rombel_model->tambah_siswa($data_rombel);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                            Data siswa Berhasil Ditambahkan!
                            </div>');
                        redirect('administrator/siswa');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                            Gagal menambah data siswa.
                            </div>');
                        redirect('administrator/siswa/tambah_siswa');
                    }
                }else{
                    // Jika melakukan tambah data beserta foto
                    if($this->upload->do_upload('foto')){
                        $data_upload['tipe'] = $this->upload->data();
                        $nama_file = 'Siswa-'.$nis.$data_upload['tipe']['file_ext'];
                        $data = array(
                            'nis' => $nis,
                            'nama_siswa' => $nama_siswa,
                            'alamat' => $alamat,
                            'jenis_kelamin' => $jenis_kelamin,
                            'tempat_lahir' => $tempat_lahir,
                            'tgl_lahir' => $tgl_lahir,
                            'email' => $email,
                            'agama' => $agama,
                            'nama_ayah' => $nama_ayah,
                            'pekerjaan_ayah' => $pekerjaan_ayah,
                            'nama_ibu' => $nama_ibu,
                            'pekerjaan_ibu' => $pekerjaan_ibu,
                            'foto' => $nama_file,
                            'no_telp' => $no_telp,
                            'idu' => $idu // Isi idu dengan nilai nis
                        );
        
                        if ($this->siswa_model->insert_data($data)) {
                            $data_rombel = [
                                'nis' => $nis,
                                'id_kelas' => $kelas,
                                'id_tahun' => $tahun
                            ];
                            $this->rombel_model->tambah_siswa($data_rombel);
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                Data siswa Berhasil Ditambahkan!
                                </div>');
                            redirect('administrator/siswa');
                        } else {
                            unlink('./assets/uploads/img/siswa/'.$nama_file);
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                Gagal menambah data siswa.
                                </div>');
                            redirect('administrator/siswa/tambah_siswa');
                        }
                    }else{
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                            Gagal upload foto siswa.
                            </div>');
                        redirect('administrator/siswa/tambah_siswa');
                    }
                }
            }
        }
    }

    private function _rules() {
        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan Anda
    }
    
    public function update($id) {
        $where = array('nis' => $id);
        $data['siswa'] = $this->siswa_model->ambil_kode_siswa($id); // Menggunakan method ambil_kode_siswa dari model
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_update', $data);
        $this->load->view('templates_administrator/footer');
    }
    
    public function update_aksi() {
        $id = $this->input->post('nis');
        $nama_siswa = $this->input->post('nama_siswa');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $email = $this->input->post('email');
        $agama = $this->input->post('agama');
        $nama_ayah = $this->input->post('nama_ayah$nama_ayah');
        $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
        $nama_ibu = $this->input->post('nama_ibu');
        $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
        $foto = $this->input->post('foto');
        $no_telp = $this->input->post('no_telp');
        $old_foto = $this->input->post('old_foto');

        // Membuat konfigurasi untuk upload file
        $config['upload_path']          = './assets/uploads/img/siswa/';
        $config['allowed_types']        = 'jpg|jpeg';
        $config['max_size']             = 5024;
        $config['overwrite']             = TRUE;
        $config['file_name']             = 'Siswa-'.$id;
        // Memuat modul bawaaan ci untuk mengangani upload file
        $this->load->library('upload', $config);

        if(!isset($_FILES['foto']) || $_FILES['foto']['error'] == UPLOAD_ERR_NO_FILE) {
            $data = array(
                'nama_siswa' => $nama_siswa,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'email' => $email,
                'agama' => $agama,
                'nama_ayah' => $nama_ayah,
                'pekerjaan_ayah' => $pekerjaan_ayah,
                'nama_ibu' => $nama_ibu,
                'pekerjaan_ibu' => $pekerjaan_ibu,
                'foto' => $old_foto,
                'no_telp' => $no_telp,
            );
    
            $where = array(
                'nis' => $id
            );

            if ($this->siswa_model->update_data($where, $data, 'siswa')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data siswa Berhasil diupdate!
                    </div>');
                redirect('administrator/siswa');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal mengupdate data siswa.
                    </div>');
                redirect('administrator/siswa');
            }

        }else{
            unlink('./assets/uploads/img/siswa/'.$old_foto); // hapus foto lama
            // Jika melakukan update data beserta foto
            if ($this->upload->do_upload('foto')){
                $data_upload['tipe'] = $this->upload->data();
                $nama_file = 'Siswa-'.$id.$data_upload['tipe']['file_ext'];
                $data = array(
                    'nama_siswa' => $nama_siswa,
                    'alamat' => $alamat,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'email' => $email,
                    'agama' => $agama,
                    'nama_ayah' => $nama_ayah,
                    'pekerjaan_ayah' => $pekerjaan_ayah,
                    'nama_ibu' => $nama_ibu,
                    'pekerjaan_ibu' => $pekerjaan_ibu,
                    'foto' => $nama_file,
                    'no_telp' => $no_telp,
                );
        
                $where = array(
                    'nis' => $id
                );

                if ($this->siswa_model->update_data($where, $data, 'siswa')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Data siswa Berhasil diupdate!
                        </div>');
                    redirect('administrator/siswa');
                } else {
                    unlink('./assets/uploads/img/siswa/'.$nama_file); // hapus foto yang baru diupload jika gagal
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Gagal mengupdate data siswa.
                        </div>');
                    redirect('administrator/siswa');
                }
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal upload foto siswa.
                    </div>');
                redirect('administrator/siswa');
            }
        }
    }
    
public function delete($id) {
    $where = array('nis' => $id);
    $this->rombel_model->hapus_siswa($id); // Hapus data di tabel childnya dulu baru di tabel parent
    $this->siswa_model->hapus_data($where,'siswa');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Data siswa Berhasil dihapus!
        </div>');
    redirect('administrator/siswa');
}
}
?>
