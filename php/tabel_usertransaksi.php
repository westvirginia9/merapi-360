<?php

include "koneksi.php";

$sql = "CREATE TABLE transaksi_user(
    id int(6) AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap varchar(255),
    alamat TEXT,
    no_telfon varchar(15),
    email varchar(30),
    voucher varchar(30),
    order_id varchar(30),
    harga DECIMAL(10,2) NOT NULL,
    nama_paket VARCHAR(255) NOT NULL,
    total_harga DECIMAL(10,2) NOT NULL,
    status_transaksi VARCHAR(5),
    kuantitas INT NOT NULL
)";

$q = $koneksi->query($sql);
if ($q === TRUE) {
    echo "Tabel transaksi_user berhasil dibuat";
} else {
    echo "gagal membuat tabel." . $koneksi->error;
}

$koneksi -> close();

?>