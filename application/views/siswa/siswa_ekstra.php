<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ekstrakurikuler Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-info" role="alert">
            <i class="fas fa-users"></i> Data Ektrakurikuler Siswa
        </div>
        
        <center>
            <legend class="mt-3"><strong>Data Ektrakurikuler Yang Diikuti</strong></legend>
        </center>

        <!-- Tampilkan Informasi Kelas -->
        <?php if (!empty($ekstra)): ?>
            <?php foreach ($ekstra as $eks) { ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5><strong><?php echo($eks->nama_ekstra); ?></strong></h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <table>
                                <tr>
                                    <td>Guru Pembimbing</td>
                                    <td>&nbsp;:
                                        <strong><?php echo($eks->nama_guru); ?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>&nbsp;:
                                        <strong><?php echo($eks->deskripsi); ?></strong>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php }  ?>
        <?php else: ?>
            <p class="card-text">Tidak ada informasi ekstrakurikuler untuk siswa ini.</p>
        <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>