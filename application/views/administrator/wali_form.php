<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Tambah Data Wali Kelas
    </div>

    <form method="post" action="<?php echo base_url('administrator/wali/tambah_wali_aksi'); ?>">
        <div class="form-group">
            <label>Nama Guru</label>
            <select class="form-control" name="nik">
                <option value="">Pilih Nama Guru</option>
                <?php foreach ($guru_list as $guru): ?>
                    <option value="<?php echo $guru->nik; ?>"><?php echo $guru->nama_guru; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="id_kelas">
                <option value="">Pilih Kelas</option>
                <?php foreach ($kelas_list as $kelas): ?>
                    <option value="<?php echo $kelas->id_kelas; ?>"><?php echo $kelas->nama_kelas; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Tahun Ajaran</label>
            <select class="form-control" name="id_tahun">
                <option value="">Pilih Tahun Ajaran</option>
                <?php foreach ($tahun_ajaran_list as $tahun_ajaran): ?>
                    <option value="<?php echo $tahun_ajaran->id_tahun; ?>"><?php echo $tahun_ajaran->tahun_ajaran; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
       
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
