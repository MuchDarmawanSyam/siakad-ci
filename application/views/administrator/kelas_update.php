<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Form Update Kelas
    </div>

    <?php foreach ($kelas as $kls) : ?>
        <form method="post" action="<?php echo base_url('administrator/kelas/update_aksi') ?>">
            <div class="form-group">
                <label for="kode_kelas">Kode Kelas</label>
                <input type="hidden" name="id_kelas" value="<?php echo $kls->id_kelas ?>">
                <input type="text" name="kode_kelas" class="form-control" value="<?php echo $kls->kode_kelas ?>" required>
            </div>

            <div class="form-group">
                <label for="nama_kelas">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" value="<?php echo $kls->nama_kelas ?>" required>
            </div>  
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>
