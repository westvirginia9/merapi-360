<?php

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$sql = "CREATE TABLE user (
    id_user int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap varchar(255),
    username varchar(30) ,
    password varchar(30) ,
    conf_password varchar(30) ,
    email varchar(30),
    no_telfon varchar(15),
    jenis_kelamin ENUM('Laki-laki', 'Perempuan'),
    foto_profil BLOB,
    alamat TEXT
    
)";

$q = $koneksi->query($sql);
if ($q === TRUE) {
    echo "Tabel user berhasil dibuat";
} else {
    echo "gagal membuat tabel.". $koneksi->error;
}

$koneksi -> close();