<?php
require "function.php";
$musik=query("select * from musik join artis on id_artis = artis.id "); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Artis</title>
    <link rel="stylesheet" href="artis.css" />
</head>
<body>
<?php
    foreach ($musik as $msk):
        ?>

    <img src="foto/<?= $msk['image']?>" alt="Profile Picture" class="profile-pic">
    <div class="name"><?= $msk['nama_artis']?></div>
    <div class="description">
    <?= $msk ['deskripsi'] ?>
    </div>
    <h3>Album</h3>
    <table>
        <tr>
            <th>Judul Lagu</th>
            <th>Durasi</th>
        </tr>
        <tr>
            <td><?= $msk ['nama_musik'] ?></td>
            <td><?= $msk ['durasi'] ?></td>
        </tr>

    </table>
    <?php
        endforeach;
        ?>
</body>
</html>