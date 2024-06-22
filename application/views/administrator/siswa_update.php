<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Edit Siswa
    </div>

    <?php foreach($siswa as $sw) : ?>
    <form method="post" action="<?php echo base_url('administrator/siswa/update_aksi') ?>" id="formEditSiswa" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nomor Induk Siswa</label>
            <input type="text" name="nis" class="form-control" value="<?php echo $sw->nis ?>" readonly>
        </div>
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" value="<?php echo $sw->nama_siswa ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $sw->alamat ?>">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="Laki-laki" <?php echo ($sw->jenis_kelamin == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($sw->jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $sw->tempat_lahir ?>">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $sw->tgl_lahir ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $sw->email ?>">
        </div>
        <div class="form-group">
            <label>Agama</label>
            <select name="agama" class="form-control">
                <option value="Islam" <?php echo ($sw->agama == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                <option value="Kristen" <?php echo ($sw->agama == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                <option value="Hindu" <?php echo ($sw->agama == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                <option value="Budha" <?php echo ($sw->agama == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                <option value="Lainnya" <?php echo ($sw->agama == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
            </select>
        </div>
        <div class="form-group">
            <label>Nama Ayah</label>
            <input type="text" name="nama_ayah" class="form-control" value="<?php echo $sw->nama_ayah ?>">
        </div>
        <div class="form-group">
            <label>Pekerjaan Ayah</label>
            <input type="text" name="pekerjaan_ayah" class="form-control" value="<?php echo $sw->pekerjaan_ayah ?>">
        </div>
        <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" class="form-control" value="<?php echo $sw->nama_ibu ?>">
        </div>
        <div class="form-group">
            <label>Pekerjaan Ibu</label>
            <input type="text" name="pekerjaan_ibu" class="form-control" value="<?php echo $sw->pekerjaan_ibu ?>">
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="no_telp" class="form-control" value="<?php echo $sw->no_telp ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <?php endforeach; ?>
</div>
