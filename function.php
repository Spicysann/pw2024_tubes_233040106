<?php

function koneksi()
{
    $conn = mysqli_connect('localhost','root', '', 'pw2024_tubes_233040106');
return $conn;
}

function query($query)
{
$conn = koneksi();

$result = mysqli_query($conn, $query);

$rows = [];
while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
return $rows;
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

if( $error === 4 ) {
    echo "<script>
    alert ('pilih gambar terlebih dahulu!');
    </script>";
    return false;
}

$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if(!in_array(ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
    alert ('Yang anda upload bukan gambar!');
    </script>";
    return false;
}

if( $ukuranFile > 1000000) {
    echo "<script>
    alert('Ukuran foto terlalu besar');
    </script>";
    return false;
}

$namaFileBaru = uniqid();
$namaFileBaru = '.';
$namaFileBaru = $ekstensiGambar;

move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

return $namaFileBaru;
}


?>