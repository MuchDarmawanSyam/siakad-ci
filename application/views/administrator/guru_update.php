<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Form Update Guru
    </div>

    <?php foreach ($guru as $gr) : ?>
        <form method="post" action="<?php echo base_url('administrator/guru/update_aksi') ?>">
            <input type="hidden" name="nik" value="<?php echo $gr->nik ?>">

            <!-- Form group untuk nomor induk guru -->
            <div class="form-group">
                <label for="nik">Nomor Induk Guru</label>
                <input type="text" name="nik" id="nik" class="form-control" value="<?php echo $gr->nik ?>" required>
                <?php echo form_error('nik','<div class="text-danger small ml-3">','</div>') ?>
            </div>
            <!-- Form group untuk nama guru -->
            <div class="form-group">
                <label for="nama_guru">Nama Guru</label>
                <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="<?php echo $gr->nama_guru ?>" required>
                <?php echo form_error('nama_guru','<div class="text-danger small ml-3">','</div>') ?>
            </div>
            <!-- Form group untuk alamat -->
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $gr->alamat ?>" required>
                <?php echo form_error('alamat','<div class="text-danger small ml-3">','</div>') ?>
            </div>
            <!-- Form group untuk jenis kelamin -->
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki" <?php echo ($gr->jenis_kelamin == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo ($gr->jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <!-- Form group untuk tempat lahir -->
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?php echo $gr->tempat_lahir ?>" required>
                <?php echo form_error('tempat_lahir','<div class="text-danger small ml-3">','</div>') ?>
            </div>
            <!-- Form group untuk tanggal lahir -->
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo $gr->tgl_lahir ?>" required>
                <?php echo form_error('tgl_lahir','<div class="text-danger small ml-3">','</div>') ?>
            </div>
            <!-- Form group untuk email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $gr->email ?>" required>
                <?php echo form_error('email','<div class="text-danger small ml-3">','</div>') ?>
            </div>
            <!-- Form group untuk agama -->
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" id="agama" class="form-control" required>
                    <option value="Islam" <?php echo ($gr->agama == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                    <option value="Kristen" <?php echo ($gr->agama == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                    <option value="Hindu" <?php echo ($gr->agama == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                    <option value="Budha" <?php echo ($gr->agama == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                    <option value="Lainnya" <?php echo ($gr->agama == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                </select>
            </div>
            <!-- Form group untuk foto -->
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg, .jpeg">
                <small class="text-muted">Format harus berupa JPEG</small>
                <?php echo form_error('foto','<div class="text-danger small ml-3">','</div>') ?>
            </div>
            <!-- Form group untuk nomor telepon -->
            <div class="form-group">
                <label for="no_telp">Nomor Telepon</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?php echo $gr->no_telp ?>" required>
                <?php echo form_error('no_telp','<div class="text-danger small ml-3">','</div>')?>
        </div>
        <!-- Tombol simpan -->
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
    </form>
    <?php endforeach; ?>
</div>
