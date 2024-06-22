<div class="container-fluid">
    <h2>Daftar Ekstrakurikuler</h2>
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Ekstrakurikuler
    </div>
    <div class="alert alert-info" role="alert">
        Tahun Ajaran: <?php echo isset($tahun_ajaran) ? $tahun_ajaran->tahun_ajaran : 'Belum ditentukan'; ?>
    </div>
    <a href="<?php echo base_url('administrator/ekstra/tambah'); ?>" class="btn btn-primary">Tambah Ekstrakurikuler</a>
    <?php if($this->session->flashdata('pesan') && !strpos($this->session->flashdata('pesan'), 'field harus diisi')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <table id="ekstra_table" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="sort" data-sort="no">
                    No
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="nama_ekstra">
                    Nama Ekstrakurikuler
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="deskripsi">
                    Deskripsi
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="guru_pembimbing">
                    Guru Pembimbing
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php $no = 1; foreach ($ekstra as $ek): ?>
                <tr>
                    <td class="no"><?php echo $no++; ?></td>
                    <td class="nama_ekstra"><?php echo $ek->nama_ekstra; ?></td>
                    <td class="deskripsi"><?php echo $ek->deskripsi; ?></td>
                    <td class="guru_pembimbing"><?php echo $ek->nama_guru; ?></td>
                    <td>
                        <a href="<?php echo base_url('administrator/ekstra/detail/'.$ek->id_ekstra); ?>" class="btn btn-info">Detail</a>
                        <a href="<?php echo base_url('administrator/ekstra/update/'.$ek->id_ekstra); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo base_url('administrator/ekstra/delete/'.$ek->id_ekstra); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: [ 'no', 'nama_ekstra', 'deskripsi', 'guru_pembimbing' ]
    };
    var ekstraList = new List('ekstra_table', options);
</script>
