<?php
include "../php/koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

// Query untuk mengambil data kota dari tabel kota
$query = "SELECT * FROM kota";
$result = $koneksi->query($query);

// Pastikan query berhasil dijalankan
if ($result) {
    // Output setiap opsi dropdown dengan data dari tabel kota
    echo '<select class="kota" name="kota" id="kota">';
    echo '<option value="" disabled selected hidden>Pilih Kota</option>';

    while ($row = $result->fetch_assoc()) {
        $nama_kota = $row['nama_kota'];
        echo "<option value='$nama_kota'>$nama_kota</option>";
    }

    echo '</select>';
} else {
    echo "Gagal mengambil data kota: " . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
?>
