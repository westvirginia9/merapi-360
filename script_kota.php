<?php 

include "php/koneksi.php";

$query = "SELECT * FROM kota";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="package-col">';
        echo '<div class="image">';
        echo '<a href="Paket' . $row['nama_kota'] . '.php">'; // Sesuaikan dengan format nama file
        echo '<img src="assets/' . strtolower($row['nama_kota']) . '.jpg" alt="' . $row['nama_kota'] . '">';
        echo '</a>';
        echo '</div>';
        echo '<h3>' . $row['nama_kota'] . '</h3>';
        echo '</div>';
    }
} else {
    echo "tidak ada data kota";
}

?>