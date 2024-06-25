<?php 
class Khs extends CI_Controller {
    public function index() {
        $data = array(
            'id_kelas' => set_value('id_kelas'),
            'id_mengajar' => set_value('id_mengajar'),  // Menambahkan id_mengajar
            'kelas_data' => $this->nilai_model->get_all_kelas(),  // Mendapatkan semua data kelas
            'tahun_ajaran_aktif' => $this->nilai_model->get_tahun_ajaran_aktif()
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/masuk_khs', $data);
        $this->load->view('templates_administrator/footer');
    }
}
?>