<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy(); 
    header("Location: LoginPage.php"); 
    exit();
}

include "php/koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$query = "SELECT * FROM paket WHERE id_kota = (SELECT id_kota FROM kota WHERE nama_kota = 'Magelang')";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Klaten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/paketKlaten.css">
</head>
<body>
    <!-- HEADER -->
    <section class="welcome">
        <!-- ... (Sesuaikan dengan struktur header yang Anda miliki) ... -->
    </section>

    <!-- PILIH PAKET -->
    <section class="pilih">
        <h2>Pilih paket kesukaan Anda di Magelang!</h2>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="admin/uploads/' . $row['gambar'] . '" alt="' . $row['nama_paket'] . '" style="width:100%">';
                echo '<h1>' . $row['nama_paket'] . '</h1>';
                echo '<p class="price">Rp ' . number_format($row['harga'], 0, ',', '.') . '</p>';
                echo '<p>' . $row['deskripsi'] . '</p>';
                echo '<button><a style="text-decoration:none" href="form_beli.php?id=' . $row['id_paket'] . '">Tambahkan</a></button>';
                echo '</div>';
            }
        } else {
            echo "Tidak ada data paket di Klaten.";
        }
        ?>

    </section>

</body>
</html>
