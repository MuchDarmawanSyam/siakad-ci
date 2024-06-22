<div class="container-fluid">
    <div class="alert alert-success text-uppercase" role="alert" style="margin-bottom: 20px;">
        <i class="fas fa-edit"></i> DETAIL WALI KELAS
    </div>

    <?php if (!empty($wali)) : ?>
        <center>
            <legend class="mt-3"><strong>Detail Wali Kelas</strong></legend>
        </center>
        <div class="d-flex justify-content-center mt-4">
            <table>
                <tr>
                    <td><strong>Nama Guru</strong></td>
                    <td>&nbsp;: <?php echo htmlspecialchars($wali->nama_guru, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>Kelas</strong></td>
                    <td>&nbsp;: <?php echo htmlspecialchars($wali->nama_kelas, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
                <tr>
                    <td><strong>Tahun Ajaran</strong></td>
                    <td>&nbsp;: <?php echo htmlspecialchars($tahun_ajaran->tahun_ajaran, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            </table>
        </div>

        <!-- Mark "Informasi Siswa" -->
        <div class="alert alert-info text-uppercase mt-4" role="alert" style="margin-bottom: 20px;">
            <i class="fas fa-info-circle"></i> Informasi Siswa
        </div>

        <!-- Add Student Button -->
        <div class="text-right mb-3">
            <a href="<?php echo site_url('administrator/wali/wali_tambah_siswa/' . $wali->id_kelas); ?>" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah Siswa
            </a>
        </div>

        <!-- Tabel siswa -->
        <div class="mt-4">
            <table id="siswa_table" class="table table-hover table-striped table-bordered">
                <thead>
                    <tr style="background-color: #f9f9f9;">
                        <th class="sort" data-sort="no">NO <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                        <th class="sort" data-sort="nis">NIS <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                        <th class="sort" data-sort="nama_siswa">NAMA SISWA <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                        <th class="sort" data-sort="jenis_kelamin">JENIS KELAMIN <span class="sort-icon"><i class="fas fa-sort"></i></span></th>
                        <th style="width: 10%; font-size: 14px;">AKSI</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php if (!empty($siswa)) : ?>
                        <?php foreach ($siswa as $key => $sw) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo htmlspecialchars($sw->nis, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($sw->nama_siswa, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($sw->jenis_kelamin, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <!-- Tambahkan link hapus siswa -->
                                    <a href="<?php echo site_url('administrator/wali/hapus_siswa/' . $sw->nis . '?id_kelas=' . $wali->id_kelas); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada siswa dalam wali kelas ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert" style="margin-top: 20px;">
            Data Wali Kelas tidak ditemukan!
        </div>
    <?php endif; ?>

    <?php echo anchor('administrator/wali', '<button class="btn btn-sm btn-danger mt-3">Kembali</button>'); ?>
</div>

<!-- Include List.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>

<!-- Initialize List.js for table sorting -->
<script>
    var options = {
        valueNames: ['no', 'nis', 'nama_siswa', 'jenis_kelamin'],
        listClass: 'list',
        sortClass: 'sort',
        sortAscClass: 'asc',
        sortDescClass: 'desc',
        searchClass: 'search',
        searchPlaceholder: 'Search',
        page: 10,
        pagination: {
            innerWindow: 1,
            outerWindow: 1,
            left: 0,
            right: 0
        }
    };

    var siswaList = new List('siswa_table', options);
</script>
