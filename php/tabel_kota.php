<?php

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$sql = "CREATE TABLE kota (
    id_kota int(6) AUTO_INCREMENT PRIMARY KEY,
    nama_kota varchar(50) NOT NULL
)";

$q = $koneksi->query($sql);
if ($q === TRUE) {
    echo "Tabel kota berhasil dibuat";
} else {
    echo "Gagal membuat tabel." . $koneksi->error;
}

$koneksi -> close();


?>