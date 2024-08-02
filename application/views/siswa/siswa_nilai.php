<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div id="myAlert">
            <div class="alert alert-info" role="alert">
                <i class="fas fa-users"></i> Data Nilai Siswa
            </div>
        </div>
        
        <center>
            <legend class="mt-3"><strong>Data Nilai Siswa</strong></legend>
        </center>

        <!-- Tampilkan Informasi Kelas -->
        <div class="card mb-4">
            <div class="card-header">
                Informasi Siswa
            </div>
            <div class="card-body">
                <?php if (!empty($siswa)): ?>
                    <div class="d-flex justify-content-center">
                        <table>
                            <tr>
                                <td><strong>Nama</strong></td>
                                <td>&nbsp;: <?php echo htmlspecialchars($siswa[0]->nama_siswa, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>NIS</strong></td>
                                <td>&nbsp;: <?php echo htmlspecialchars($siswa[0]->nis, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tempat Tanggal Lahir</strong></td>
                                <td>&nbsp;: 
                                    <?php 
                                          echo htmlspecialchars($siswa[0]->tempat_lahir, ENT_QUOTES, 'UTF-8'); 
                                          echo(", "); 
                                          echo htmlspecialchars($siswa[0]->tgl_lahir, ENT_QUOTES, 'UTF-8'); 
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>&nbsp;: <?php echo htmlspecialchars($siswa[0]->alamat, ENT_QUOTES, 'UTF-8'); ?></td>
                            </tr>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="card-text">Tidak ada informasi kelas untuk siswa ini.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-12">
            <form id="form-pilih">
                <div class="row">
                    <div class="form-group col-5">
                        <label for="kelas">Pilih Kelas:</label>
                        <select class="form-control" id="kelas" name="kelas" required>
                            <option value="pilih">--Pilih Kelas--</option>
                            <option value="7">Kelas 7</option>
                            <option value="8">Kelas 8</option>
                            <option value="9">Kelas 9</option>
                        </select>
                    </div>
                    <div class="form-group col-5">
                        <label for="semester">Pilih Semester:</label>
                        <select class="form-control" id="semester" name="semester" required>
                            <option value="pilih">--Pilih Semester--</option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>
                    <button type="submit" id="btnSubmit" class="btn btn-success mt-4 mb-3" disabled="true">Tampilkan</button>
                </div>
            </form>
        </div>

        <div class="col-12 pb-5">
            <table class="table table-hover">
                <thead>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru Pengajar</th>
                    <th>KKM</th>
                    <th>Nilai</th>
                    <th>Predikat</th>
                </thead>
                <tbody id="data-nilai">
                    <td colspan="6" class="text-center"> Belum ada data nilai </td>
                </tbody>
            </table>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnSubmit').click(function(e) {
                e.preventDefault();
                let kelas = $('#kelas').val();
                let smt = $('#semester').val();
                let nis = "<?php echo($siswa[0]->nis); ?>";
                if (smt != "pilih" && kelas != "pilih") {
                    $.ajax({
                        url: "<?php echo base_url('siswa/siswa_nilai/show_nilai'); ?>",
                        type: "POST",
                        data: {kelas: kelas, smt: smt, nis: nis},
                        success: function(data) {
                            console.log("Response Data:", data); // Debugging log
                            $('#data-nilai').html(data); // Menampilkan data nilai ke dalam tabel
                        },
                        error: function(xhr, status, error) {
                            console.log("Ajax Error:", xhr.responseText); // Debugging log
                            $('#myAlert').html('<div class="alert alert-danger">Terjadi kesalahan, silakan coba lagi.</div>');
                        }
                    });
                } else {
                    $('#myAlert').html('<div class="alert alert-warning">Pilih Kelas dan Semester Terlebih Dahulu.</div>');
                }
            });

            // Validasi Untuk memastikan form terisi
            $('#kelas').change(function(e) {
                let kelas = $('#kelas').val();
                let smt = $('#semester').val();
                if (smt != "pilih" && kelas != "pilih"){
                    $('#btnSubmit').attr('disabled', false);
                }else{
                    $('#btnSubmit').attr('disabled', true);
                }
            });
            $('#semester').change(function(e) {
                let id_kelas = $('#kelas').val();
                let smt = $('#semester').val();
                if (smt != "pilih" && kelas != "pilih"){
                    $('#btnSubmit').attr('disabled', false);
                }else{
                    $('#btnSubmit').attr('disabled', true);
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>