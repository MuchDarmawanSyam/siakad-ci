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
            <i class="fas fa-landmark"></i> Form tambah pengguna
        </div>

        <?= $this->session->flashdata('pesan') ?>

        <div class="row">
            <div class="col-md-6">
                <h5>Pilih Guru</h5>
                <form method="post" action="<?=base_url('administrator/user/tambah_aksi');?>">
                    <div class="form-group">
                        <select name="guru" class="form-control">
                            <?php foreach ($data_guru as $guru): ?>
                                <option value="<?php echo $guru->nik; ?>"><?php echo $guru->nama_guru; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <hr>

                    <h5>Email</h5>
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" onkeyup="validasiInput();" placeholder="email">
                    </div>
            </div>

            <div class="col-md-6">
                <h5>Username</h5>
                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" onkeyup="validasiInput();"  placeholder="username">
                </div>

                <hr>
                
                <button type="submit" id="btnSubmit" class="btn btn-success" disabled="true" style="margin-top: 30px !important;">Tambah</button>
            </form>
                <?php echo anchor('administrator/user', '<button class="btn btn-danger" style="margin-top: 30px !important;">Kembali</button>'); ?>                
            </div>
        </div>
    </div>
</body>
<script>
    function validasiInput(){
        usr = document.getElementById('username');
        email = document.getElementById('email');
        if(usr.value && email.value){
            document.getElementById('btnSubmit').disabled = false;
        }else{
            document.getElementById('btnSubmit').disabled = true;
        }
    }
</script>
</html>
