<?php

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$sql = "CREATE TABLE transaksi (
    id_transaksi INT(10) AUTO_INCREMENT PRIMARY KEY,
    id_user INT(6) UNSIGNED,
    id_paket INT(10) ,
    tanggal_berlibur DATE,
    jumlah_tiket INT,
    harga DECIMAL(10, 2),
    total_pembelian DECIMAL(10,2),
    total_harga DECIMAL(10,2),
    status_pembayaran VARCHAR(50) DEFAULT 'Menunggu Pembayaran',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_paket) REFERENCES paket(id_paket)
)";

$q = $koneksi->query($sql);
if ($q === TRUE) {
    echo "Tabel transaksi berhasil dibuat";
} else {
    echo "gagal membuat tabel.". $koneksi->error;
}

$koneksi -> close();

?>