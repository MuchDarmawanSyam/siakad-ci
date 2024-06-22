<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Form Update Ekstrakurikuler
    </div>

    <?php if (!empty($ekstra) && is_object($ekstra)) : ?>
        <form method="post" action="<?= base_url('administrator/ekstra/update_aksi') ?>">
            <div class="form-group">
                <label for="nama_ekstra">Nama Ekstrakurikuler</label>
                <input type="hidden" name="id_ekstra" value="<?= $ekstra->id_ekstra ?>">
                <input type="text" name="nama_ekstra" class="form-control" value="<?= isset($ekstra->nama_ekstra) ? $ekstra->nama_ekstra : '' ?>">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"><?= isset($ekstra->deskripsi) ? $ekstra->deskripsi : '' ?></textarea>
            </div>

            <!-- Dropdown untuk memilih nama guru -->
            <div class="form-group">
                <label for="guru">Nama Guru</label>
                <select name="guru" class="form-control">
                    <?php foreach ($guru_list as $guru) : ?>
                        <option value="<?= $guru->nik; ?>" <?= ($ekstra->nik == $guru->nik) ? 'selected' : ''; ?>><?= $guru->nama_guru; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Dropdown untuk memilih kelas -->
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" class="form-control">
                    <?php foreach ($kelas_list as $kelas) : ?>
                        <option value="<?= $kelas->id_kelas; ?>" <?= ($ekstra->id_kelas == $kelas->id_kelas) ? 'selected' : ''; ?>><?= $kelas->nama_kelas; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            Data ekstrakurikuler tidak ditemukan.
        </div>
    <?php endif; ?>
</div>
