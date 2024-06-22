<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Tahun Ajaran
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/tahun_ajaran/tambah', '<button class="btn btn-sm btn-primary mb-3">Tambah Tahun Ajaran</button>') ?>
    <table id="tahun_ajaran_table" class="table table-hover table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th class="sort" data-sort="no">
                    NO
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="tahun_akademik">
                    Tahun Akademik
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="status">
                    Status
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if (!empty($tahun_ajaran)) : ?>
                <?php $no = 1; ?>
                <?php foreach($tahun_ajaran as $ta) : ?>
                <tr>
                    <td class="no"><?php echo $no++ ?></td>
                    <td class="tahun_akademik"><?php echo $ta->tahun_ajaran ?></td>
                    <td class="status"><?php echo $ta->status ?></td>
                    <td>
                        <a href="<?php echo base_url('administrator/tahun_ajaran/edit/'.$ta->id_tahun); ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url('administrator/tahun_ajaran/delete/'.$ta->id_tahun); ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Belum ada data tahun ajaran</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: [ 'no', 'tahun_akademik', 'status' ]
    };
    var tahunAjaranList = new List('tahun_ajaran_table', options);
</script>
