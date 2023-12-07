<?php

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$sql = "CREATE TABLE paket (
    id_paket INT(10) PRIMARY KEY AUTO_INCREMENT,
    nama_paket VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    harga DECIMAL(10, 2) NOT NULL,
    gambar BLOB,
    id_kota INT,
    FOREIGN KEY (id_kota) REFERENCES kota(id_kota)
)";

$q = $koneksi->query($sql);
if ($q === TRUE) {
    echo "Tabel paket berhasil dibuat";
} else {
    echo "gagal membuat tabel.". $koneksi->error;
}

$koneksi -> close();

?>