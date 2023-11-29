<?php

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$sql = "CREATE TABLE user_admin (
    id_admin int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama varchar(255),
    username varchar(30),
    password varchar(30)
)";

$q = $koneksi->query($sql);
if ($q === TRUE) {
    echo "Tabel admin berhasil dibuat";
} else {
    echo "Gagal membuat tabel." . $koneksi->error;
}

$koneksi -> close();

?>