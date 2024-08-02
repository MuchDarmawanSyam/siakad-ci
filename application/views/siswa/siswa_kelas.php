<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-info" role="alert">
            <i class="fas fa-users"></i> Data Kelas Siswa
        </div>
        
        <center>
            <legend class="mt-3"><strong>Data Siswa di Kelas</strong></legend>
        </center>

        <!-- Tampilkan Informasi Kelas -->
        <div class="card mb-4">
            <div class="card-header">
                Informasi Kelas
            </div>
            <div class="card-body">
                <?php if (!empty($kelas) && is_object($kelas)): ?>
                    <div class="d-flex justify-content-center">
                        <table>
                            <tr>
                                <td><strong>Kelas</strong></td>
                                <td>&nbsp;: <?php echo htmlspecialchars($kelas->kode_kelas, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Wali Kelas</strong></td>
                                <td>&nbsp;: <?php if(!empty($wali)): ?>
                                    <?php echo htmlspecialchars($wali->nama_guru, ENT_QUOTES, 'UTF-8'); ?>
                                    <?php else: ?>
                                        Belum ada informasi guru wali untuk kelas ini.
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="card-text">Tidak ada informasi kelas untuk siswa ini.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Tampilkan Data Siswa -->
        <div class="card">
            <div class="card-header">
                Data Siswa
            </div>
            <div class="card-body">
                <?php if (!empty($siswa)): ?>
                    <ul class="list-group">
                        <?php foreach ($siswa as $siswa_item): ?>
                            <li class="list-group-item">
                                <strong><?php echo htmlspecialchars($siswa_item->nama_siswa, ENT_QUOTES, 'UTF-8'); ?></strong> - <?php echo htmlspecialchars($siswa_item->nis, ENT_QUOTES, 'UTF-8'); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Tidak ada data siswa.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
