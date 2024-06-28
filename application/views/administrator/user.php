<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Data Pengguna
    </div>
    
    <?php echo $this->session->flashdata('pesan'); ?>

    <center>
        <legend class="mt-3"><strong>Data Pengguna</strong></legend>
    </center>

    <?php echo anchor('administrator/user/tambah', '<button class="btn btn-sm btn-primary mb-3">Tambah Pengguna</button>'); ?>

    <div class="mt-4">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($data_pengguna as $pengguna) : ?>
                <tr>
                    <td width="20px"><?php echo $no++ ?></td>
                    <td><?php echo htmlspecialchars($pengguna->username, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo $pengguna->email; ?></td>
                    <td>
                        <a href="<?php echo base_url('administrator/mengajar/delete/'.$pengguna->idu); ?>" class="btn btn-danger">Hapus</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url('administrator/mengajar/update_mengajar/'.$pengguna->idu); ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
