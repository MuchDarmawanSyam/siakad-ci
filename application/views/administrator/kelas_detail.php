    <div class="container-fluid">
        <div class="alert alert-success text-uppercase" role="alert" style="margin-bottom: 20px;">
            <i class="fas fa-edit"></i> DETAIL KELAS
        </div>
        <div style="padding-top: 20px; padding-bottom: 20px;">
            <?php if (!empty($detail)) : ?>
                <table class="table table-hover table-striped table-bordered" style="background-color: #fff; width: 100%;">
                    <?php foreach ($detail as $dt): ?>
                        <tr>
                            <th style="width: 30%; font-size: 18px;">Nama Kelas</th>
                            <td style="width: 70%; font-size: 18px;"><?php echo $dt->nama_kelas; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <!-- Mark "Informasi Siswa" -->
                <div class="alert alert-info text-uppercase" role="alert" style="margin-bottom: 20px;">
                    <i class="fas fa-info-circle"></i> Informasi Siswa
                </div>
                <!-- Tabel siswa -->
                <table class="table table-hover table-striped table-bordered" style="background-color: #fff; width: 100%;">
                    <thead>
                        <tr style="background-color: #f9f9f9;">
                            <th style="font-size: 14px;">NO</th>
                            <th style="font-size: 14px;">NAMA SISWA</th>
                            <th style="width: 15%; font-size: 14px;">JENIS KELAMIN</th>
                            <th style="font-size: 14px;">ALAMAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($siswa)) : ?>
                            <?php $no = 1; ?>
                            <?php foreach ($siswa as $sw) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $sw->nama_siswa; ?></td>
                                    <td><?php echo $sw->jenis_kelamin; ?></td>
                                    <td><?php echo $sw->alamat; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada siswa dalam kelas ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="alert alert-danger" role="alert" style="margin-top: 20px;">
                Data Kelas tidak ditemukan!
            </div>
        <?php endif; ?>
    </div>
