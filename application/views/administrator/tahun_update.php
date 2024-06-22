<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Update Tahun Ajaran
    </div>
    <form action="<?php echo base_url('administrator/tahun_ajaran/update'); ?>" method="post">
        <div class="form-group">
            <label for="tahun_ajaran">Tahun Akademik</label>
            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $tahun_ajaran->tahun_ajaran; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Aktif" <?php if ($tahun_ajaran->status == 'Aktif') echo 'selected'; ?>>Aktif</option>
                <option value="Tidak Aktif" <?php if ($tahun_ajaran->status == 'Tidak Aktif') echo 'selected'; ?>>Tidak Aktif</option>
            </select>
        </div>
        <input type="hidden" name="id_tahun" value="<?php echo $tahun_ajaran->id_tahun; ?>">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>