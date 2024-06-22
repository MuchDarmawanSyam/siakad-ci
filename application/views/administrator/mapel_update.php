<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Form Edit Mata Pelajaran
    </div>

    <?php foreach($mapel as $mp) : ?>
    <form method="post" action="<?php echo base_url('administrator/mapel/update_aksi') ?>">
        <div class="form-group">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" class="form-control" value="<?php echo $mp->nama_mapel ?>">
        </div>
        <div class="form-group">
            <label>Kode Mata Pelajaran</label>
            <input type="text" name="kode_mapel" class="form-control" value="<?php echo $mp->kode_mapel ?>">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?php echo $mp->deskripsi ?>">
        </div>
        <!-- Menambahkan input hidden untuk menyimpan id_mapel -->
        <input type="hidden" name="id_mapel" value="<?php echo $mp->id_mapel ?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <?php endforeach; ?>
</div>
