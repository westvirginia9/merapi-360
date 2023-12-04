<?php
session_start();

include "php/koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

// Ambil data user dari database berdasarkan username
$username = $_SESSION['username'];
// Lakukan query sesuai dengan struktur tabel dan kolom di database Anda
$query = $koneksi->query("SELECT * FROM user WHERE username='$username'");
$user_data = $query->fetch_assoc();

// Periksa apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: LoginPage.php");
    exit();
}

// Ambil data user dari database berdasarkan username
$username = $_SESSION['username'];
// Lakukan query sesuai dengan struktur tabel dan kolom di database Anda
$query = $koneksi->query("SELECT * FROM user WHERE username='$username'");
$user_data = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/ProfilePage.css">
</head>
<body>
    <!-- HEADER -->
    <section class="navigasi">
        <section class="welcome">
            <nav>
                <a href="Homepage.html"><img src="assets/LogoM360W.png" alt="Merapi360" width="150"></a>
                <div class="nav-link" id="navLink">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="">Beranda</a></li>
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
            </nav>
    <form action="update_profil.php" method="post" enctype="multipart/form-data" name="profileForm">
                <div class="mid-text">
                    <h1>Hi, <?php echo $username; ?>!</h1>
                    <p>Bagaimana kabar Anda hari ini?</p>
                </div>
        </section>

        <!-- CONTENT -->
        <section class="isi">
            <div class="kiri">
                <div class="fotoprofil">
                    <img src="assets/profpic.jpg" alt="" id="profilImage">
                </div>

                <div class="icon">
                    <label for="image">
                        <i class="fa fa-camera"></i>
                    </label>
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" onchange="previewImage()">
                </div>

                <div class="btn-edit">
                    <input type="submit" value="Hapus Foto Profil" id="foto"> <br>
                    <input type="submit" value="Ubah Password" id="pass">
                </div>
            </div>

            <div class="kanan">
                <div class="data-diri">
                    <div class="data">
                        <h1>Nama Lengkap</h1>
                        <input type="text" name="nama_lengkap" value="<?php echo $user_data['nama_lengkap']; ?>" required>
                    </div>

                    <div class="data">
                        <h1>Username</h1>
                        <input type="text" name="username" value="<?php echo $user_data['username']; ?>" required>
                    </div>

                    <div class="data">
                        <h1>Jenis Kelamin</h1>
                        <input type="text" value="<?php echo $user_data['jenis_kelamin']; ?>" required>
                    </div>

                    <div class="data">
                        <h1>Alamat</h1>
                        <input type="text" placeholder="Isikan alamat" name="alamat" value="<?php echo $user_data['alamat']; ?>" required>
                    </div>

                    <div class="data">
                        <h1>Email</h1>
                        <input type="email" name="email" value="<?php echo $user_data['email']; ?>" required>
                    </div>


                    <div class="data">
                        <h1>No. Handphone</h1>
                        <input type="text" name="no_telfon" value="<?php echo $user_data['no_telfon']; ?>" required>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <div class="ubah">
            <input type="submit" value="Simpan" name="simpan" id="simpan">
            <input type="submit" value="Batal" name="batal" id="batal">
        </div>
    </form>

    <!-- FOOTER -->
    <section class="footer">
        <div class="footer-wrap">
            <div class="footer-content">
                <img src="assets/LogoM360.png" alt="">
                <p>Lorem ipsum dolor sit amet</p>
            </div>
    
            <div class="footer-content">
                <ul>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Customer Service</a></li>
                    <li><a href="">Terms & Conditions</a></li>
                    <li><a href="">FAQs</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <ul>
                    <li><a href="">Our Products</a></li>
                    <li><a href="">Refund Policy</a></li>
                    <li><a href="">Payment Option</a></li>
                    <li><a href="">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-content">
                <input type="email">
                <button type="submit">subscribe</button>
    
                <h2>Follow Us</h2>
    
                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-instagram"></i>
                <i class="fa fa-linkedin"></i>
            </div>
        </div>
        </section>

    <script src="script/ProfilePage.js"></script>
</body>
</html>