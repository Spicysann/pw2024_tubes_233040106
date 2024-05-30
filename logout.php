<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="login.css">
    <title>Smolly.Fy</title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                    <h2>Smolly.Fy</h2>
                    <div class="register">
                        <p>Yakin ingin keluar? 
                            <br><a href="login.php">Yakin</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
</body>

</html>