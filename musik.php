<?php

require "function.php";
$musik=query("select * from musik join artis on id_artis = artis.id"); 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Smolly.Fy</title>
</head>
   
<body>
    <div class="container">
    <h1>Daftar musik</h1>
    <a href="tambahmusik.php" class="btn btn-primary"> Tambah Musik</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Musik</th>
      <th scope="col">Artis</th>
      <th scope="col">File musik</th>
      <th scope="col">image</th>
      <th scope="col">Aksi</th>
    </tr>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </thead>
  <tbody>
    <?php $i =1;
     foreach($musik as $msk) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $msk ['nama_musik'] ?></td>
      <td><?= $msk ['nama_artis'] ?></td>
      <td><?= $msk ['musik'] ?></td>
      <td><?= $msk ['image'] ?></td>
      <td>
        <a href="ubahmusik.php?id=<?= $msk['id']; ?>" class="badge text-bg-warning text-decoration-none">Ubah</a>
        <a href="hapus.php?id=<?= $msk['id']; ?>" onclick="return confirm('yakin?')" class="badge text-bg-danger text-decoration-none">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>