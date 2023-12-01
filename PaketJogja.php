<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy(); 
    header("Location: LoginPage.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merapi360</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/PaketJogja.css">
</head>
<body>
    <!-- HEADER -->
    <section class="welcome">
        <nav>
            <a href="Homepage.html"><img src="assets/LogoM360W.png" alt="Merapi360" width="200"></a>
            <div class="nav-link" id="navLink">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="Homepage.html">Beranda</a></li>
                    <li><a href="">Tentang Kami</a></li>
                    <div class="dropdown">
                    <li><a href="">Paket Liburan</a></li>
                        <div class="kota-drop">
                            <a href="">Jogjakarta</a>
                            <a href="">Magelang</a>
                            <a href="">Klaten</a>
                            <a href="">Boyolali</a>
                        </div>
                    </div>
                    <li><a href="">Diskon Tiket</a></li>
                    <div class="dropdown">
                        <li><a href="">Akun Saya</a></li>
                        <div class="akun-drop">
                            <a href="">Profil</a>
                            <a href="">Keranjang</a>
                            <a href="">Favorit</a>
                            <a href="?logout">Logout</a>
                        </div>
                    </div>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>

        <div class="mid-text">
            <h1>Jogja Istimewa</h1>
            <p>Lorem ipsum dolor sit amet</p>
            <a href="" class="kotakBtn">Telusuri Sekarang</a>
        </div>
    </section>

    <!-- PILIH PAKET -->
    <section class="pilih">
        <h2>Pilih paket kesukaan Anda!</h2>

        <?php
    include "php/koneksi.php";

    $nama_db = "djawir_db";
    $koneksi->query("USE $nama_db");

    $query = "SELECT * FROM paket";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Ambil data paket dan tampilkan dalam card
            echo '<div class="card">';
            echo '<img src="admin/uploads/' . $row['gambar'] . '" alt="' . $row['nama_paket'] . '" style="width:100%">';
            echo '<h1>' . $row['nama_paket'] . '</h1>';
            echo '<p class="price">Rp ' . number_format($row['harga'], 0, ',', '.') . '</p>';
            echo '<p>' . $row['deskripsi'] . '</p>';
            echo '<button><a style="text-decoration:none" href="form_pembelian.php?id=' . $row['id_paket'] . '">Tambahkan</a></button>';
            echo '</div>';
        }
    } else {
        echo "Tidak ada data paket.";
    }

    $koneksi->close();
    ?>
        <div class="card">
            <img src="assets/ullen-sentalu.jpg" alt="Denim Jeans" style="width:100%">
            <h1>Paket Baladewa</h1>
            <p class="price">Rp 600.000</p>
            <p>RASAKAN SENSASI!!!</p>
            <p><button>Tambahkan</button></p>
          </div>
        <div class="card">
            <img src="assets/paketjogja.jpg" alt="Denim Jeans" style="width:100%">
            <h1>Paket Petruk</h1>
            <p class="price">Rp 700.000</p>
            <p>RASAKAN SENSASI!!!</p>
            <p><button>Tambahkan</button></p>
          </div>
    </section>

</body>
</html>