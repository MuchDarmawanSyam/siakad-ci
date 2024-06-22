<!-- application/controllers/Nilai.php -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

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

    public function nilai_aksi() {
        // Atur aturan validasi
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required|numeric');

        // Periksa apakah validasi form berhasil
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, muat ulang halaman index
            $this->index();
        } else {
            // Ambil tahun ajaran aktif
            $tahun_ajaran_aktif = $this->nilai_model->get_tahun_ajaran_aktif();
            $id_tahun = $tahun_ajaran_aktif ? $tahun_ajaran_aktif->id_tahun : null;

            // Ambil ID kelas dan ID mengajar dari input form
            $id_kelas = $this->input->post('id_kelas', TRUE);

            // Periksa apakah ID kelas valid
            $kelas = $this->nilai_model->get_kelas_by_id($id_kelas);
            if ($kelas == null) {
                // Kelas tidak ditemukan, setel pesan kesalahan dan redirect
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kelas yang Anda input belum terdaftar!</div>');
                redirect('administrator/nilai');
            } else {
                // Ambil data mata pelajaran dan guru pengajar untuk kelas dan tahun ajaran yang diberikan
                $mata_pelajaran_guru = $this->nilai_model->get_mata_pelajaran_guru($id_kelas, $id_tahun);

                // Data untuk dikirim ke view
                $datanilai = array(
                    'nilai_data' => $mata_pelajaran_guru,  // Menggunakan $mata_pelajaran_guru untuk menampilkan data
                    'id_tahun' => $id_tahun,
                    'id_kelas' => $id_kelas,
                    'tahun_ajaran' => $tahun_ajaran_aktif ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak Diketahui',
                    'nama_kelas' => $kelas->nama_kelas
                );

                // Muat view dengan data nilai
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar');
                $this->load->view('administrator/nilai_kelas', $datanilai);
                $this->load->view('templates_administrator/footer');
            }
        }
    }
}
?>
