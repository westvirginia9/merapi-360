<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>daftar user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

<?php
// Sertakan file koneksi
include "../php/koneksi.php";
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">No. Telfon</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Query untuk mengambil data user dari database
    $query = "SELECT * FROM user";
    $result = $koneksi->query($query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Iterasi melalui setiap baris hasil query
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <th scope='row'>$no</th>
                    <td>{$row['nama_lengkap']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['no_telfon']}</td>
                </tr>";
            $no++;
        }

        // Bebaskan hasil query
        $result->free();
    } else {
        echo "Error: " . $koneksi->error;
    }

    // Tutup koneksi ke database
    $koneksi->close();
    ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>