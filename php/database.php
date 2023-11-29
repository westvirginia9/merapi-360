<?php

include "koneksi.php";

$sql = "CREATE DATABASE djawir_db";
$q = $koneksi -> query($sql);
if ($q === TRUE) {
    echo "Database 'djawir_db' sukes dibuat!";
} else {
    echo "Gagal membuat basisdata 'djawir_db'. ". $koneksi->error;
}
$koneksi->close();

?>