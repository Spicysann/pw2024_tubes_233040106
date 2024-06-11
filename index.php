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
    <link rel="stylesheet" href="styless.css" />
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
                <li><a href="#artis">Musik</a></li>
                <li><a href="#contact">Contact</a></li>
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
<div class="search">
    <form action="" method="post">
        <input type="text" name="keyword" size="25" placeholder="search.." autocomplete="off" id="keyword">
        <input type="hidden" class="search" name="search" id="tombol-cari"></input>
    </form>
</div>
<div class="artis-container">
    <h2>MUSIK</h2>
    <div class="music-container">
    <?php
    foreach ($musik as $msk):
        ?>
            <div class="music-card">
                <div class="music-image">
                    <img src="foto/<?=$msk['image']?>" alt="Music Photo">
                </div>
                <div class="music-details">
                    <h2><?=$msk['nama_musik']?></h2>
                    <p><?=$msk['nama_artis']?></p>
                </div>
                <div class="controls">
                    <button class="play-pause">Play</button>
                      <input type="range" class="timeline" value="0" max="100">
                    <input type="range" class="volume-control" min="0" max="1" step="0.01" value="1">
                </div>
                <audio class="music-player" src="lagu/<?=$msk['musik']?>"></audio>
            </div>
            <?php
            endforeach;
            ?>
    </div>

    <script>
        document.querySelectorAll('.play-pause').forEach(button => {
            button.addEventListener('click', function() {
                var card = this.closest('.music-card');
                var musicPlayer = card.querySelector('.music-player');
                var timeline = card.querySelector('.timeline');
                if (musicPlayer.paused) {
                    musicPlayer.play();
                    this.textContent = 'Pause';
                } else {
                    musicPlayer.pause();
                    this.textContent = 'Play';
                }

                musicPlayer.addEventListener('timeupdate', function() {
                    var value = (100 / musicPlayer.duration) * musicPlayer.currentTime;
                    timeline.value = value;
                });
            });
        });

        document.querySelectorAll('.timeline').forEach(timeline => {
            timeline.addEventListener('input', function() {
                var card = this.closest('.music-card');
                var musicPlayer = card.querySelector('.music-player');
                var time = (this.value * musicPlayer.duration) / 100;
                musicPlayer.currentTime = time;
            });
        });

        document.querySelectorAll('.volume-control').forEach(volumeControl => {
            volumeControl.addEventListener('input', function() {
                var card = this.closest('.music-card');
                var musicPlayer = card.querySelector('.music-player');
                musicPlayer.volume = this.value;
            });
        });
    </script>
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
</html>
