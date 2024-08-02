<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Daftar Wali Kelas
    </div>
    
    <?php echo $this->session->flashdata('pesan'); ?>

    <?php echo anchor('administrator/wali/tambah_wali', '<button class="btn btn-sm btn-primary mb-3">Tambah Data Guru Wali</button>'); ?>
    
    <!-- Display the active academic year -->
    <div class="alert alert-info">
        Tahun Ajaran Aktif: <?php echo isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
    </div>
    
    <table id="wali_table" class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>NO</th>
                <th>KELAS</th>
                <th>WALI KELAS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <!-- Looping data wali kelas dari database -->
            <?php $no = 1; foreach($wali_kelas as $wali): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $wali->nama_kelas; ?></td>
                    <td><?php echo $wali->nama_guru; ?></td>
                    <td>
                        <?php echo anchor('administrator/wali/detail/' . $wali->id_kelas, '<div class="btn btn-sm btn-info">Detail</div>'); ?>
                        <?php echo anchor('administrator/wali/update/' . $wali->id_kelas, '<div class="btn btn-sm btn-primary">Update</div>'); ?>
                        <?php echo anchor('administrator/wali/hapus/' . $wali->id_kelas, '<div class="btn btn-sm btn-danger">Hapus</div>', ['onclick' => 'return confirm(\'Yakin ingin menghapus data ini?\')']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
