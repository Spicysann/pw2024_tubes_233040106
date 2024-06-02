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

function search($keyword) {
    $query = "SELECT * FROM musik join artis on id_artis = artis.id
            WHERE nama_music
            LIKE '%$keyword%'
            OR nama_artis
            Like '%$keyword%'
";
return query($query);
}

function tambah($data)
{
    $conn = koneksi();

    $nama = htmlspecialchars($msk['image']);
    $nim = htmlspecialchars($msk['nama_musik']);
    $email = htmlspecialchars($msk['nama_artis']);
    $jurusan = htmlspecialchars($msk['musik']);
  
    $query = "INSERT INTO musik join artis
          VALUES (null, '$image', '$nama_musik', '$nama_artis', '$musik')
    ";
  
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    $conn = koneksi();

    $id = htmlspecialchars($msk['image']);
    $nama = htmlspecialchars($msk['nama_musik']);
    $nim = htmlspecialchars($msk['nama_artis']);
    $email = htmlspecialchars($msk['musik']);

  
    $query = "UPDATE mahasiswa SET
                foto = '$image',
                nama_musik= '$nama_musik',
                nama_artis= '$nama_artis',
                musik = '$musik'
                WHERE id = $id
    ";
  
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    return mysqli_affected_rows($conn);
}

?>