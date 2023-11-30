<?php

include "../php/koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kota = $_POST['kota'];
    $nama_wisata = $_POST['nama_wisata'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_temp = $_FILES['gambar']['tmp_name'];
    $upload_dir = "admin/uploads/"; // Sesuaikan dengan folder penyimpanan gambar

    // Pindahkan gambar ke direktori upload
    move_uploaded_file($gambar_temp, "uploads/" . $gambar);

    $query_check_kota = "SELECT * FROM kota WHERE nama_kota = '$kota'";
    $result_check_kota = $koneksi->query($query_check_kota);

    if ($result_check_kota->num_rows > 0) {
        $row = $result_check_kota->fetch_assoc();
        $id_kota = $row['id_kota'];

        $sql = "INSERT INTO paket (nama_paket, deskripsi, harga, gambar, id_kota) 
                VALUES ('$nama_wisata', '$deskripsi', '$harga', '$gambar', '$id_kota')";
        
        if ($koneksi->query($sql) === TRUE) {
            echo "Paket ditambahkan";
        } else {
            echo "Gagal menambahkan paket: " . $koneksi->error;
        }
    } else {
        echo "Kota tidak valid";
    }
}

$koneksi->close();

?>