<?php
// Load file koneksi.php
include "php/koneksi.php";

// Mendapatkan data dari form
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$id_paket = $_POST['id_paket']; // Sesuaikan dengan nama input di form
$jumlah_tiket = $_POST['jumlah_tiket']; // Sesuaikan dengan nama input di form

// Menghitung biaya berdasarkan jumlah tiket dan harga tiket (diasumsikan harga tiket ada di database paket)
$query_harga = mysqli_query($koneksi, "SELECT harga FROM paket WHERE id_paket = '$id_paket'");
$harga = mysqli_fetch_assoc($query_harga)['harga'];
$biaya = $jumlah_tiket * $harga;

// Men-generate order_id secara acak (anda bisa menggunakan metode yang sesuai dengan kebutuhan)
$order_id = rand();
$transaction_status = 1; // Anda dapat mengatur status transaksi sesuai kebutuhan

// Menginput data ke database transaksi
mysqli_query($koneksi, "INSERT INTO transaksi (nama, alamat, email, id_paket, tanggal_berlibur, jumlah_tiket, harga, total_pembelian, total_harga, order_id, transaction_status) 
                        VALUES ('$nama', '$alamat', '$email', '$id_paket', '$tanggal_berlibur', '$jumlah_tiket', '$harga', '$biaya', '$biaya', '$order_id', '$transaction_status')");

// Mengalihkan halaman kembali ke proses checkout (anda dapat menyesuaikan URL dan parameter yang dikirim)
header("location:./midtrans/examples/snap/checkout-process-simple-version.php?order_id=$order_id");
?>
