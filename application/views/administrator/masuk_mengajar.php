<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Halaman Data Mengajar Kelas
    </div>
    
    <?php echo $this->session->flashdata('pesan'); ?>

    <div class="alert alert-info">
        Tahun Ajaran Aktif: <?php echo isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
    </div>

    <form method="post" action="<?php echo base_url('administrator/mengajar/mengajar_aksi'); ?>">
        <div class="form-group">
            <label>Kelas</label>
            <?php
                $query_kelas = $this->db->query('SELECT id_kelas, nama_kelas FROM kelas');
                $kelas = $query_kelas->result();
                $kelasDropdown = array();

                foreach ($kelas as $kelas_item) {
                    $kelasDropdown[$kelas_item->id_kelas] = $kelas_item->nama_kelas;
                }

                echo form_dropdown('id_kelas', $kelasDropdown, '', 'class="form-control" id="id_kelas"');
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Proses</button>
    </form>
</div>
