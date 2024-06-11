<?php
require 'function.php';


$id = $_GET['id'];

$msk = query("SELECT * FROM artis WHERE id = $id");

if(isset($_POST['ubah'])) {
 if(ubahArtis($_POST) > 0) {
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
    <title>Ubah Artis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        <div class="container col-8">
        <h1>Ubah Artis</h1>

        <form action="" method="POST" enctype="multipart/from-data">
            <input type="hidden" name="id" value="<?= $artis['id']; ?>
            <div class="mb-3">
                <label for="nama_artis" class="form-label">Nama Artis</label>
                <input type="text" class="form-control" id="nama_artis" name="nama_artis">
            <div class="mb-3">
                <label for="image" class="form-label">File Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>  
            <button type="submit" name="ubah" class="btn btn-primary">Ubah Artis</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></>
  </body>
</html>