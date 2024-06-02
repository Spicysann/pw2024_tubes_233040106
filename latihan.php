<?php

require "function.php";
$musik=query("select * from musik join artis on id_artis = artis.id"); 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="" />
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
 <div class="artis-judul">

 <b>ARTIS</b></div>
    <div class="card-container">
    <?php
    foreach ($musik as $msk):
        ?>
   <div class="card">
        <div class="music-info">
            <div class="music-image">
                <img src="foto/<?= $msk['image']?>" alt="Music Photo">
            </div>
            <div class="music-details">
                <h2><?= $msk['nama_artis']?></h2>
                <p><?= $msk['nama_musik']?></p>
            </div>
        </div>
        <audio controls>
            <source src="lagu/<?= $msk['musik']?>" type="audio/mpeg">s
        </audio>
    </div>
        <?php
        endforeach;
        ?>
    </div>
  </div>
</div>


<section class="contact" id="contact"></section>
<div class="contact-container">
<h2>Contact Us</h2>
    <form action="mailto:alamat-email-sandyalfaizal2005@gmail.com" method="post" enctype="text/plain">
        <input type="text" name="name" placeholder="Your Name" required><br>
        <input type="text" name="email" placeholder="Your Email" required><br>
        <textarea name="message" rows="5" placeholder="Your Message" required></textarea><br>
        <input type="submit" value="Send Email">
    </form>
</div>
    </body>
