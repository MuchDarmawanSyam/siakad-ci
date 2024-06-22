<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Tambah Tahun Ajaran
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <form action="<?php echo base_url('administrator/tahun_ajaran/tambah'); ?>" method="post">
        <div class="form-group">
            <label for="tahun_ajaran">Tahun Akademik</label>
            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Contoh: 2024/2025" required>
            <?php echo form_error('tahun_ajaran', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
            <?php echo form_error('status', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
