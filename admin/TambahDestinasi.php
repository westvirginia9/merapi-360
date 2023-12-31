<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi Wisata</title>
    <link rel="stylesheet" href="../style/TambahDestinasi.css">
</head>
<body>
    <div class="container">
        <div class="head">
            <table border="0">
                <tr align="center" valign="center" >
                    <td class="logo" width="120">
                        <img src="../assets/LogoM360.png" alt="" width="150">
                    </td>
                    <td class="welcome" width="1000">
                        <h1>Tambah Destinasi Wisata</h5>
                    </td>
                    <td class="button" width="120">
                        <a href="?logout">Logout</a>
                    </td>
                </tr>
            </table>
        </div>

        <div class="content">
            <form action="tambahPaket.php" method="post" enctype="multipart/form-data">
                <?php include "kotaController.php"; ?>
                <br>

                <select class="kota" name="kota" id="kota">
                    <option value="" disabled selected hidden>Pilih Kota</option>
                    <?php
                        // Loop through the kota options
                        while ($row = $result->fetch_assoc()) {
                            $nama_kota = $row['nama_kota'];
                            echo "<option value='$nama_kota'>$nama_kota</option>";
                        }
                    ?>
                </select> <br>

                <input type="text" class="wisata" name="nama_wisata" placeholder="Nama Wisata" required> <br>

                <input type="text" class="deskripsi" name="deskripsi" placeholder="Deskripsi" required> <br>

                <input type="text" class="harga" name="harga" placeholder="Harga Tiket" required> <br>

                <label for="gambar">Upload Gambar:</label>
                <input type="file" name="gambar" id="gambar" required> <br>

                <input type="submit" value="Simpan" id="simpanUbah"> <br>
                <input type="submit" value="Batal" id="batalUbah">
            </form>
        </div>
    </div>

    <script src="../script/TambahDestinasi.js"></script>
</body>
</html>
