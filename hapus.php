<?php
require 'function.php';

$id = $_GET['id'];
if(hapus($id) > 0) {
    echo "<script>
    alert('data berhasil ditambah!');
    document.location.href = 'index.php';
    </script>";
   }
