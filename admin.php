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
    <link rel="stylesheet" href="styles.css" />
    <title>Smolly.Fy</title>
</head>
   
<body>
<nav>
        <div class="nav__content">
            <div class="logo"><a href="#">Smolly.Fy</a></div>
            <label for="check" class="checkbox">
                <i class="ri-menu-line"></i>
            </label>
            <input type="checkbox" name="check" id="check" />
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#artis">Artis</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="logout.php">Log out</a></li>
               
            </ul>
        </div>
    </nav>
    <section class="hero">
        <div class="container">
            <div class="content">
                <p class="subtitle">HELLO</p>
                <h1 class="title">
                    Wellcome to <span>Smolly.Fy<br />
                </h1>
                <p class="description">
                Read the meaning of the song only here.
                </p>
            </div>
        </div>
    </section>
    <br />
<section class="artis" id="artis"></section>
<div class="artis-container">
 <div class="artis-judul"></a>


 <b>ARTIS</b>
 <br>  <a href="tambah_artis.php"><button>Tambahkan Artis</button></a>
 </div>
    <div class="card-container">
    <?php
    foreach ($musik as $msk):
        ?>
        <div class="card">
        <img src="foto/<?= $msk['image']?>" alt="Foto 1">
        <p><?= $msk['nama_artis']?></p>
        <a href="tambah_lagu.php"><button>Tambahkan Lagu</button></a>
        </div>
        <?php
        endforeach;
        ?>
    </div>
  </div>
</div>
</body>