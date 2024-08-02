<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mengajar Kelas</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-edit"></i> Form Halaman Data Mengajar Kelas
        </div>
        
        <?php echo $this->session->flashdata('pesan'); ?>

        <div class="alert alert-info">
            Tahun Ajaran Aktif: <?php echo isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
        </div>

        <form method="post" action="<?php echo base_url('administrator/mengajar/mengajar_aksi'); ?>">
            <div class="form-group">
                <?php
                    $query_kelas = $this->db->query('SELECT id_kelas, nama_kelas FROM kelas');
                    $kelas = $query_kelas->result();
                ?>

                <table id="kelasTable" class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>NO</th> <!-- tambahkan sort disini -->
                            <th>Nama Kelas</th> <!-- dan disini -->
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($kelas as $kelas_item): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($kelas_item->nama_kelas, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <button type="submit" name="id_kelas" value="<?php echo $kelas_item->id_kelas; ?>" class="btn btn-primary">Pilih</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#kelasTable').DataTable({
                "order": [[0, "asc"], [1, "asc"]] // Mengurutkan berdasarkan kolom "NO" dan "Nama Kelas" secara ascending
            });
        });
    </script>
</body>
</html>
