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

        <div class="form-group">
            <label for="tahun_ajaran">Tahun Ajaran</label>
            <select name="tahun_ajaran" id="tahun_ajaran" class="form-control" required>
                <?php foreach ($tahun_ajaran as $ta): ?>
                    <option value="<?php echo $ta->id_tahun; ?>"><?php echo $ta->tahun_ajaran; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
</div>
