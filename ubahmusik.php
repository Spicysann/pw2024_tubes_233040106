<?php
require 'function.php';


$id = $_GET['id'];

$msk = query("SELECT * FROM musik WHERE id = $id");

if(isset($_POST['ubah'])) {
 if(ubahMusik($_POST) > 0) {
  echo "<script>
  alert('data berhasil diubah!');
  document.location.href = 'admin.php';
  </script>";
 }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Musik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container col-8">
        <h1>Ubah Musik</h1>

        <form action="" method="POST" enctype="multipart/from-data">
            <input type="hidden" name="id" value="<?= $musik['id']; ?>
            <div class="mb-3">
                <label for="nama_musik" class="form-label">Nama Musik</label>
                <input type="text" class="form-control" id="nama_musik" name="nama_musik">
            
            <div class="mb-3">
                <label for="id_artis" class="form-label">Nama Artis</label>
                <select type="text" class="form-control" id="id_artis" name="id_artis">
                <option value=""></option>
                    <?php foreach($artis as $art) : ?>
    <option value="<?= $art['id'] ?>"><?= $art['nama_artis'] ?></option>
<?php endforeach; ?>

                </select>
            </div>
            <div class="mb-3">
                <label for="musik" class="form-label">File Musik</label>
                <input type="file" class="form-control" id="musik" name="musik">
            </div>  
            <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></>
  </body>
</html>