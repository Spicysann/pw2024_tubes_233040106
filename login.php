<?php
include 'db.php';
require "function.php";
session_start();

// if (!isset($_SESSION['login'])) {
//     header("Location: login.php");
// }

if (isset($_POST["login"])){
    $conn = koneksi();
    $username = $_POST["username"];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");


    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $conn = koneksi();
            $_SESSION['username'] = $username;
            $_SESION['login'] = true;

            $username = $_SESSION['username'] = $username;


            $role = query("SELECT role FROM users WHERE username = '$username'")[0]["role"];

            var_dump($role);

            if ($role === "admin") {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that username";
    }

    $conn->close();


}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $sql = "SELECT * FROM users WHERE username = '$username'";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         if (password_verify($password, $row['password'])) {
//             $conn = koneksi();
//             $_SESSION['username'] = $username;
//             $_SESION['login'] = true;

//             $username = $_SESSION['username'] = $username;


//             $result = mysqli_num_rows(mysqli_query("SELECT role FROM users WHERE role = 'admin'"));
//             if ($result > 1) {
//                 // header("Location: admin.php");
//             } else {
//                 // header("Location: index.php");
//             }
//         } else {
//             echo "Invalid password";
//         }
//     } else {
//         echo "No user found with that username";
//     }

//     $conn->close();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="login.css">
    <title>login</title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
            <form method="post" action="">
                    <h2>Smolly.Fy</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="username" required>
                        <label for="">Username</label>
                        
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <button type="submit" name="login">Login</button>
                    <div class="register">
                        <p>Belum memiliki akun? <a href="register.php">Register sekarang juga!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>