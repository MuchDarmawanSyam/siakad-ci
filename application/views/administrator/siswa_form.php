<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Form tambah Siswa
    </div>
    <?php echo $this->session->flashdata('pesan') ?>

    <form method="post" action="<?php echo base_url('administrator/siswa/tambah_siswa_aksi') ?>" enctype="multipart/form-data">
        <!-- Form group untuk nomor induk siswa -->
        <div class="form-group">
            <label for="nis">Nomor Induk Siswa</label>
            <input type="text" name="nis" id="nis" class="form-control" required>
            <?php echo form_error('nis', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk nama siswa -->
        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required>
            <?php echo form_error('nama_siswa', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
            <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk jenis kelamin -->
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <!-- Form group untuk tempat lahir -->
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
            <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk tanggal lahir -->
        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
            <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
            <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk agama -->
        <div class="form-group">
            <label for="agama">Agama</label>
            <select name="agama" id="agama" class="form-control" required>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <?php echo form_error('agama', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk nama ayah -->
        <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required>
            <?php echo form_error('nama_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk pekerjaan ayah -->
        <div class="form-group">
            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
            <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control" required>
            <?php echo form_error('pekerjaan_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk nama ibu -->
        <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
            <?php echo form_error('nama_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk pekerjaan ibu -->
        <div class="form-group">
            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
            <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" required>
            <?php echo form_error('pekerjaan_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk kelas -->
        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select name="id_kelas" id="id_kelas" class="form-control" required>
                <?php foreach ($kelas as $kls) : ?>
                    <option value="<?php echo $kls->id_kelas; ?>"><?php echo $kls->nama_kelas; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('id_kelas', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk foto -->
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" accept=".jpg, .jpeg">
            <small class="text-muted">Format harus berupa JPG atau JPEG</small>
            <?php echo form_error('foto', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Form group untuk nomor telepon -->
        <div class="form-group">
            <label for="no_telp">Nomor Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control" required>
            <?php echo form_error('no_telp', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <!-- Tombol simpan -->
        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
        <?php echo anchor('administrator/siswa', '<div class="btn btn-danger mb-5">Kembali</div>') ?>
    </form>
</div>
