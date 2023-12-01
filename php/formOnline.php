<?php

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$sql = "CREATE TABLE form_online (
    id_form int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email varchar(255),
    pertanyaan varchar(255)
    
)";

$q = $koneksi->query($sql);
if ($q === TRUE) {
    echo "Tabel form_online berhasil dibuat";
} else {
    echo "Gagal membuat tabel." . $koneksi->error;
}

$koneksi -> close();

?>