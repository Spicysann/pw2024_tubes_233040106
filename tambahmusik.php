<?php
require 'function.php';
//jika tombol tambah ditekan
if(isset($_POST['tambah'])) {
 //jka data berhasil ditambahkan
 if(tambahMusik($_POST) > 0) {
  echo "<script>
  alert('data berhasil ditambah!');
  document.location.href = 'admin.php';
  </script>";
 }
}
$artis = query("SELECT *  FROM artis");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-8">
        <h1>Tambah Musik</h1>

        <form action="" method="POST" enctype="multipart/from-data">
            <div class="mb-3">
                <label for="nama_musik" class="form-label">Nama musik</label>
                <input type="text" class="form-control" id="nama_musik" name="nama_musik" required>
            </div>
            
            <div class="mb-3">
                <label for="nama_artis" class="form-label">Nama Artis</label>
                <select class="form-control" id="nama_artis" name="id_artis">
                    <option value=""></option>
                    <?php foreach($artis as $art) : ?>
    <option value="<?= $art['id'] ?>"><?= $art['nama_artis'] ?></option>
<?php endforeach; ?>

                </select>
            </div>
            <div class="mb-3">
                <label for="musik" class="form-label">Pilih File Musik</label>
                <input type="file" class="form-control" id="musik" name="musik">
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></>
  </body>
</html>