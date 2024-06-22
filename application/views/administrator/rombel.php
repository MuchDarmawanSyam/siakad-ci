<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tingkatan Kelas Siswa</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.min.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-landmark"></i> Daftar Tingkatan Kelas Siswa
        </div>   
        <div>
            <div class="alert alert-info">
                Tahun Ajaran Aktif: <?php echo isset($tahun_ajaran_aktif->tahun_ajaran) ? $tahun_ajaran_aktif->tahun_ajaran : 'Tidak ada tahun ajaran aktif'; ?>
            </div>
        </div>
        <div class="col-md-12">
            <h5>Pilih Kelas Asal</h5>
            <form id="form_pilih_kelas">
                <div class="form-group">
                    <select name="id_kelas" id="kelas_asal" class="form-control">
                        <option value="">Pilih Kelas Asal</option>
                        <?php foreach ($kelas_asal as $kelas): ?>
                            <option value="<?php echo $kelas->id_kelas; ?>"><?php echo $kelas->nama_kelas; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Pilih</button>
            </form>
            <hr>
            <form id="form_pindah_siswa" action="<?php echo base_url('rombel/transfer_siswa_terpilih'); ?>" method="post">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select_all"></th>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="siswa_table">
                        <tr>
                            <td colspan="5" class="text-center">Pilih kelas asal terlebih dahulu</td>
                        </tr>
                    </tbody> 
                </table>
                <button type="submit" class="btn btn-sm btn-primary">Pindah yang terpilih ke Kelas Tujuan</button>
            </form>
        </div>  
    </div>

    <script>
        $(document).ready(function() {
            $('#form_pilih_kelas').submit(function(e) {
                e.preventDefault();
                var id_kelas = $('#kelas_asal').val();
                if (id_kelas) {
                    $.ajax({
                        url: "<?php echo base_url('rombel/get_siswa_by_kelas'); ?>",
                        type: "POST",
                        data: {id_kelas: id_kelas},
                        success: function(data) {
                            console.log("Response Data:", data); // Debugging log
                            $('#siswa_table').html(data); // Menampilkan data siswa ke dalam tabel
                        },
                        error: function(xhr, status, error) {
                            console.log("Ajax Error:", xhr.responseText); // Debugging log
                            $('#siswa_table').html('<tr><td colspan="5" class="text-center">Terjadi kesalahan, silakan coba lagi.</td></tr>');
                        }
                    });
                } else {
                    $('#siswa_table').html('<tr><td colspan="5" class="text-center">Pilih kelas asal terlebih dahulu</td></tr>');
                }
            });
        });
    </script>
</body>
</html>
