<?php

include "../php/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kota = $_POST['kota'];
    $nama_wisata = $_POST['nama_wisata'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_temp = $_FILES['gambar']['tmp_name'];
    $upload_dir = "uploads/"; // Sesuaikan dengan folder penyimpanan gambar

    // Pindahkan gambar ke direktori upload
    move_uploaded_file($gambar_temp, $upload_dir . $gambar);

    $sql = "INSERT INTO wisata (nama_paket, deskripsi, harga, gambar, id_kota) 
            VALUES ('$kota', '$nama_wisata', '$deskripsi', '$harga', '$gambar')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Wisata berhasil ditambahkan";
    } else {
        echo "Gagal menambahkan wisata: " . $koneksi->error;
    }
}

$koneksi->close();

?>