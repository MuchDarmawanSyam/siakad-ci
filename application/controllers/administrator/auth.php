<?php
class Auth extends CI_Controller{

    public function index()
    {
        $this->load->view('templates_administrator/header');
        $this->load->view('administrator/login');
        $this->load->view('templates_administrator/footer');
    }

    public function proses_login()
    {
        $this->load->model('login_model'); // Memuat model login_model
    
        $this->form_validation->set_rules('username','Username','required',[
            'required' => 'Username Wajib diisi'
        ]);
        $this->form_validation->set_rules('password','Password','required',[
            'required' => 'Password Wajib diisi'
        ]);
    
        if ($this->form_validation->run() == FALSE){
            $this->load->view('templates_administrator/header');
            $this->load->view('administrator/login');
            $this->load->view('templates_administrator/footer'); 
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password')); // Gunakan md5 untuk mengenkripsi password
    
            $cek = $this->login_model->cek_login($username, $password);
    
            if($cek->num_rows() > 0){
                $sess_data = array(); // Inisialisasi array sesi sebelum penggunaan
                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['hak_akses'] = $ck->hak_akses;
                    $sess_data['nik'] = $ck->idu;
                }
                $this->session->set_userdata($sess_data); // Set semua data sesi sekaligus
    
                if($sess_data['hak_akses'] == 'admin'){
                    redirect('administrator/dashboard');
                } elseif($sess_data['hak_akses'] == 'guru'){
                    redirect('guru/dashboard');
                } elseif($sess_data['hak_akses'] == 'siswa') {
                    redirect('siswa/dashboard'); // Sesuaikan dengan url dashboard siswa
                } else {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau password salah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
                    redirect('administrator/auth');
                } 
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau password salah
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>');
                redirect('administrator/auth');
            }
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('administrator/auth');
    }
}    
?>