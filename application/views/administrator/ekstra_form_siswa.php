<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa ke Ekstrakurikuler</title>
</head>
<body>

<div id="container">
    <h2>Tambah Siswa ke Ekstrakurikuler</h2>

    <?php echo $this->session->flashdata('pesan'); ?>

    <form action="<?php echo site_url('administrator/ekstra/tambah_siswa_aksi/'.$ekstra->id_ekstra); ?>" method="post">
        <label for="nis">Pilih Siswa:</label>
        <select name="nis">
            <?php foreach ($siswa_list as $siswa): ?>
                <option value="<?php echo $siswa->nis; ?>"><?php echo $siswa->nama_siswa; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" value="Tambahkan Siswa">
    </form>

    <br>
    <a href="<?php echo site_url('administrator/ekstra'); ?>">Kembali</a>

</div>

</body>
</html>
