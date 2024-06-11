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
    <link rel="stylesheet" href="adminn.css" />
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
                <li><a href="logout.php">Log out</a></li>      
            </ul>
        </div>
    </nav>
    <div class="dashboard">
        <?php
            $cards = [
                ["title" => "Musik","icon" => "🎵", "link" => "musik.php"],
                ["title" => "Artis","icon" => "👤", "link" => "artis.php"],
            ];

            // Loop untuk menampilkan card
            foreach ($cards as $card) {
                echo "<a href='{$card['link']}' class='card'>";
                echo "<div class='icon'>{$card['icon']}</div>";
                echo "<h2>{$card['title']}</h2>";
                echo "</a>";
            }
        ?>
    </div>
</body>
</html>