<?php

include "../php/koneksi.php"



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/TambahDestinasi.css">
</head>
<body>
    <div class="container">
        <div class="head">
            <table border="0">
                <tr align="center" valign="center" >
                    <td class="logo" width="120">
                        <img src="/assets/LogoM360.png" alt="" width="150">
                    </td>
                    <td class="welcome" width="1000">
                        <h1>Tambah Destinasi Wisata</h5>
                    </td>
                    <td class="button" width="120">
                        <input type="submit" value="Logout" id="logoutButton">
                    </td>
                </tr>
            </table>
        </div>

        <div class="content">
            <select class="kota" id="">
                <option value="" disabled selected hidden>Pilih Kota</option>
                <option value="Jogjakarta">Jogjakarta</option>
                <option value="Magelang">Magelang</option>
                <option value="Klaten">Klaten</option>
                <option value="Boyolali">Boyolali</option>
            </select> <br>

            <input type="text" class="wisata" placeholder="Nama Wisata"> <br>

            <input type="text" class="deskripsi" placeholder="Deskripsi"> <br>

            <input type="text" class="harga" placeholder="Harga Tiket"> <br>

            <input type="submit" value="Simpan" id="simpanUbah"> <br>
            <input type="submit" value="Batal" id="batalUbah">
        </div>

    </div>

    <script src="/script/TambahDestinasi.js"></script>
</body>
</html>