<?php

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$sql = "CREATE TABLE user_profile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    foto_profil BLOB,
    alamat TEXT,
    FOREIGN KEY (id_user) REFERENCES user(id_user),
    INDEX (id_user)  -- Pastikan kolom kunci asing diindeks
)";

$q = $koneksi->query($sql);
if ($q === TRUE) {
    echo "Tabel paket berhasil dibuat";
} else {
    echo "gagal membuat tabel." . $koneksi->error;
}

$koneksi -> close();

?>