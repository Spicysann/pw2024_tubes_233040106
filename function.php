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

move_uploaded_file($tmpName, 'foto/' . $namaFileBaru);

return $namaFileBaru;
}

function uploadMusik(){
    $namaFile = $_FILES['musik']['name'];
    $ukuranFile = $_FILES['musik']['size'];
    $error = $_FILES['musik']['error'];
    $tmpName = $_FILES['musik']['tmp_name'];

if( $error === 4 ) {
    echo "<script>
    alert ('pilih musik terlebih dahulu!');
    </script>";
    return false;
}

$ekstensiGambarValid = ['mp3'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if(!in_array(ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
    alert ('Yang anda upload bukan musik!');
    </script>";
    return false;
}

if( $ukuranFile > 100000) {
    echo "<script>
    alert('Ukuran musik terlalu besar');
    </script>";
    return false;
}

$namaFileBaru = uniqid();
$namaFileBaru = '.';
$namaFileBaru = $ekstensiGambar;

move_uploaded_file($tmpName, 'lagu/' . $namaFileBaru);

return $namaFileBaru;
}

function search($keyword) {
    $query = "SELECT * FROM musik join artis on id_artis = artis.id
            WHERE nama_musik
            LIKE '%$keyword%'
            OR id_artis
            Like '%$keyword%'
";
return query($query);
}
function tambahMusik($data)
{
    $conn = koneksi();

    $nama_musik = htmlspecialchars($data['nama_musik']);
    $id_artis = htmlspecialchars($data['id_artis']);
    $musik = htmlspecialchars($data['musik']);
  
    $query = "INSERT INTO musik (nama_musik, id_artis, musik)
          VALUES ('$nama_musik', '$id_artis', '$musik')
    ";
  
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function hapusMusik($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM musik WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubahMusik($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($data['id']);
    $nama_musik = htmlspecialchars($data['nama_musik']);
    $id_artis = htmlspecialchars($data['id_artis']);
    $musik = htmlspecialchars($data['musik']);
  
    $query = "UPDATE musik SET
                nama_musik = '$nama_musik',
                id_artis = '$id_srtis',
                musik = '$musik',
                WHERE id = $id
    ";
  
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function tambahArtis($data)
{
    $conn = koneksi();

    $nama_artis = htmlspecialchars($data['nama_artis']);
    $image = htmlspecialchars($data['image']);
  
    $query = "INSERT INTO artis (nama_artis, image)
          VALUES ('$nama_artis', '$image')
    ";
  
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function hapusArtis($id)
{
    $conn = koneksi();
    $id = (int)$id;
    mysqli_query($conn, "DELETE FROM artis WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubahArtis($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($data['id']);
    $nama_artis = htmlspecialchars($data['nama_artis']);
    $image = htmlspecialchars($data['image']);
  
    $query = "UPDATE artis SET
                nama_artis = '$nama_artis',
                image = '$image',
                WHERE id = $id
                ";
  


    return mysqli_affected_rows($conn);
}

?>