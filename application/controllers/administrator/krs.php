<?php 
class Krs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->model('Tahun_model');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index() {
        $data = array(
            'id_tahun' => set_value('id_tahun'),
            'id_kelas' => set_value('id_kelas'),
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/masuk_krs', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function krs_aksi() {
        $this->ruleskrs();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id_tahun = $this->input->post('id_tahun', TRUE);
            $id_kelas = $this->input->post('id_kelas', TRUE);

            $kelas = $this->Kelas_model->get_by_id($id_kelas);
            if ($kelas == null) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kelas yang anda input belum terdaftar!</div>');
                redirect('administrator/krs');
            } else {
                $tahun = $this->Tahun_model->get_by_id($id_tahun);

                $datakrs = array(
                    'krs_data' => $this->baca_krs($id_kelas, $id_tahun),
                    'id_tahun' => $id_tahun,
                    'id_kelas' => $id_kelas,
                    'tahun_ajaran' => $tahun ? $tahun->tahun_ajaran : '',
                    'nama_kelas' => $kelas ? $kelas->nama_kelas : ''
                );

                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar');
                $this->load->view('administrator/krs_list', $datakrs);
                $this->load->view('templates_administrator/footer');
            }
        }
    }

    private function baca_krs($id_kelas, $id_tahun) {
        $this->db->select('k.id_krs, k.id_mapel, m.nama_mapel, g.nama_guru');
        $this->db->from('krs as k');
        $this->db->where('k.id_kelas', $id_kelas);
        $this->db->where('k.id_tahun', $id_tahun);
        $this->db->join('mapel as m', 'm.id_mapel = k.id_mapel');
        $this->db->join('guru as g', 'g.nik = m.nik'); 

        return $this->db->get()->result();
    }

    private function ruleskrs() {
        $this->form_validation->set_rules('id_tahun', 'Tahun Ajaran', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
    }

    public function tambah_krs($id_tahun, $id_kelas) {
        $kelas = $this->Kelas_model->get_by_id($id_kelas);
        if ($kelas == null) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data kelas tidak ditemukan!</div>');
            redirect('administrator/krs');
        }

        $tahun_ajaran = $this->Tahun_model->get_by_id($id_tahun)->tahun_ajaran;
        $nama_kelas = $kelas->nama_kelas;

        $data = array(
            'id_krs' => set_value('id_krs'),
            'id_tahun' => $id_tahun,
            'tahun_ajaran' => $tahun_ajaran,
            'id_kelas' => $id_kelas,
            'nama_kelas' => $nama_kelas
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/krs_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_krs_aksi() {
        $id_tahun = $this->input->post('id_tahun', TRUE);
        $id_kelas = $this->input->post('id_kelas', TRUE);
        $id_mapel = $this->input->post('id_mapel', TRUE);

        $data = array(
            'id_tahun' => $id_tahun,
            'id_kelas' => $id_kelas,
            'id_mapel' => $id_mapel
        );

        $this->db->insert('krs', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">KRS berhasil ditambahkan!</div>');
        redirect('administrator/krs');
    }
}
?>