<!-- application/views/administrator/masuk_khs.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk KHS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Masukkan KHS</h2>
        <?php //echo form_open('administrator/nilai/nilai_aksi'); // Harusnya masuk data nila khs ?>
        <?php echo form_open(); ?>
            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select class="form-control" id="id_kelas" name="id_kelas" required>
                    <option value="">Pilih Kelas</option>
                    <?php foreach($kelas_data as $kelas): ?>
                        <option value="<?php echo $kelas->id_kelas; ?>" <?php echo set_select('id_kelas', $kelas->id_kelas); ?>>
                            <?php echo $kelas->nama_kelas; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo form_close(); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
