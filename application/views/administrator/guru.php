<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Guru
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/guru/tambah_guru', '<button class="btn btn-sm btn-primary mb-3">Tambah Guru</button>') ?>
    
    <table id="guru_table" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th class="sort" data-sort="no">
                    NO
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="nama_guru">
                    NAMA LENGKAP
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="alamat">
                    ALAMAT
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th class="sort" data-sort="email">
                    EMAIL
                    <span class="sort-icon"><i class="fas fa-sort"></i></span>
                </th>
                <th colspan="3">AKSI</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php if(empty($guru)): ?>
                <tr>
                    <td colspan="7" class="text-center">Belum ada guru.</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; foreach($guru as $gru) : ?>
                    <tr>
                        <td class="no"><?php echo $no++ ?></td>
                        <td class="nama_guru"><?php echo $gru->nama_guru ?></td>
                        <td class="alamat"><?php echo $gru->alamat ?></td>
                        <td class="email"><?php echo $gru->email ?></td>
                        <td><?php echo anchor('administrator/guru/detail/'.$gru->nik, 'Detail', array('class' => 'btn btn-info btn-sm')); ?></td>
                        <td><?php echo anchor('administrator/guru/update/'.$gru->nik, 'Edit', array('class' => 'btn btn-primary btn-sm')); ?></td>
                        <td><?php echo anchor('administrator/guru/delete/'.$gru->nik, 'Hapus', array('class' => 'btn btn-danger btn-sm')); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: [ 'no', 'nama_guru', 'alamat', 'email' ]
    };
    var guruList = new List('guru_table', options);
</script>
