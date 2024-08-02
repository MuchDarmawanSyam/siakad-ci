<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-landmark"></i> Data Pengguna
    </div>
    
    <?php echo $this->session->flashdata('pesan'); ?>

    <center>
        <legend class="mt-3"><strong>Data Pengguna</strong></legend>
    </center>

    <?php echo anchor('administrator/user/tambah_guru', '<button class="btn btn-sm btn-primary mb-3">Tambah Pengguna Guru/Admin</button>'); ?>
    <?php echo anchor('administrator/user/tambah_siswa', '<button class="btn btn-sm btn-primary mb-3">Tambah Pengguna Siswa</button>'); ?>

    <div class="mt-4">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA LENGKAP</th> 
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>HAK AKSES</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($data_pengguna as $pengguna) : ?>
                <tr>
                    <td width="20px"><?php echo $no++ ?></td>
                    <td><?php echo htmlspecialchars($pengguna->nama_lengkap, ENT_QUOTES, 'UTF-8'); ?></td> <!-- Data Nama Lengkap -->
                    <td><?php echo htmlspecialchars($pengguna->username, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($pengguna->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($pengguna->hak_akses, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="<?php echo base_url('administrator/user/delete/'.$pengguna->idu); ?>" class="btn btn-danger">Hapus</a>
                    </td>
                    <td>
                        <a href="<?php echo base_url('administrator/user/update/'.$pengguna->idu); ?>" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
