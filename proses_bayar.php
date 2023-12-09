<?php

include "php/koneksi.php";

$nama_lengkap = $_POST['nama_lengkap'];
$nama_paket = $_POST['nama_paket'];
$alamat = $_POST['alamat'];
$no_telfon = $_POST['no_telfon'];
$email = $_POST['email'];
$order_id = rand();
$status_transaksi = 1;
$id_transaksi = "";
$harga_paket = $_POST['harga_paket'];  // Harga diambil dari form (diasumsikan user sudah memilih paket dengan harganya)
$kuantitas = $_POST['kuantitas'];  // Kuantitas diambil dari form
$total_harga = $harga_paket * $kuantitas;


$query = "INSERT INTO transaksi_user (nama_lengkap, nama_paket, alamat, no_telfon, total_harga, harga, email, order_id, status_transaksi, kuantitas) 
          VALUES ('$nama_lengkap', '$nama_paket', '$alamat', '$no_telfon', '$total_harga', '$harga_paket', '$email', '$order_id', '$status_transaksi', '$kuantitas')";


if (mysqli_query($koneksi, $query)) {
    echo "Data transaksi_user berhasil ditambahkan";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

header("location: midtrans-php/examples/snap/checkout-process-simple-version.php?order_id=$order_id");

?>