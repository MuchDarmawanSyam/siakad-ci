<div class="container-fluid">
    <div class="alert alert-success" role="alert">
         <i class="fas fa-landmark"></i> Form tambah Mata Pelajaran
    </div>
    <form method="post" action="<?php echo base_url('administrator/mapel/tambah_mapel_aksi')?>">

        <div class="form-group">
            <label for="nama_mapel">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" required>
            <?php echo form_error('nama_mapel','<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label for="kode_mapel">Kode Mata Pelajaran</label>
            <input type="text" name="kode_mapel" id="kode_mapel" class="form-control" required>
            <?php echo form_error('kode_mapel','<div class="text-danger small ml-3">','</div>') ?>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
            <?php echo form_error('deskripsi','<div class="text-danger small ml-3">','</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
</div>
