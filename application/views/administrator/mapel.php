<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit"></i> Daftar Mata Pelajaran
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo anchor('administrator/mapel/tambah_mapel', '<button class="btn btn-sm btn-primary mb-3">Tambah Mata Pelajaran</button>') ?>
    <table id="mapel_table" class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th class="sort" data-sort="no">NO <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="nama_mapel">Nama Mapel <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="kode_mapel">Kode Mapel <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th class="sort" data-sort="deskripsi">Deskripsi <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                <th colspan="3">Aksi</th>
            </tr> 
        </thead>
        <tbody class="list">
            <?php if (!empty($mapel)) : ?>
                <?php $no = 1; foreach($mapel as $mp) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $mp->nama_mapel ?></td>
                    <td><?php echo $mp->kode_mapel ?></td>
                    <td><?php echo $mp->deskripsi ?></td>
                    <td>
                        <a href="<?php echo base_url('administrator/mapel/detail/'.$mp->id_mapel); ?>" class="btn btn-sm btn-info">Detail</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url('administrator/mapel/delete/'.$mp->id_mapel); ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url('administrator/mapel/update/'.$mp->id_mapel); ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8">Belum ada data mata pelajaran</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script>
    var options = {
        valueNames: [ 'no', 'nama_mapel', 'kode_mapel', 'deskripsi', 'nama_guru' ]
    };
    var mapelList = new List('mapel_table', options);
</script>
