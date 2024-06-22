<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Kelas
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/kelas/tambah_kelas', '<button class="btn btn-sm btn-primary mb-3">Tambah Kelas</button>') ?>
    
    <table id="kelas_table" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="sort" data-sort="no">
                    NO
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="kode_kelas">
                    KODE KELAS
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="nama_kelas">
                    NAMA KELAS
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
            
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if (!empty($kelas)) : ?>
                <?php $no = 1; ?>
                <?php foreach ($kelas as $kls) : ?>
                    <tr>
                        <td class="no"><?= $no++ ?></td>
                        <td class="kode_kelas"><?= $kls->kode_kelas ?></td>
                        <td class="nama_kelas"><?= $kls->nama_kelas ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?php echo anchor('administrator/kelas/update/'.$kls->id_kelas, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</div>') ?>
                                <?php echo anchor('administrator/kelas/delete/'.$kls->id_kelas, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</div>') ?>
                                <?php echo anchor('administrator/kelas/detail_kelas/'.$kls->id_kelas, '<div class="btn btn-sm btn-info"><i class="fa fa-info"></i> Detail</div>') ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">Belum ada data kelas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: [ 'no', 'kode_kelas', 'nama_kelas', 'nama_guru' ]
    };
    var kelasList = new List('kelas_table', options);
</script>
