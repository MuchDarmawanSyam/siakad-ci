<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Form Tambah Kelas
    </div>
    <form method="post" action="<?php echo base_url('administrator/kelas/tambah_kelas_aksi')?>">
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" required>
            <?php echo form_error('nama_kelas','<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label for="kode_kelas">Kode Kelas</label>
            <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" required>
            <?php echo form_error('kode_kelas','<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
</div>
