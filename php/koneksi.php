<?php

$server = "localhost";
$username = "root";
$password = "";
$nama_db = "djawir_db";

$koneksi = new mysqli($server, $username, $password, $nama_db);

if ($koneksi->connect_error) {
    die("koneksi gagal : " . $koneksi->connect_error);
}

?>