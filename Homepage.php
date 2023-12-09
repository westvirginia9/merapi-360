<?php
session_start();

include "php/koneksi.php"; // Sesuaikan dengan nama file koneksi Anda

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan query untuk mendapatkan data user berdasarkan username
    // Gantilah ini dengan koneksi dan query yang sesuai dengan aplikasi Anda
    $query = "SELECT id_user FROM user WHERE username = '$username' AND password = '$password'";
    $result = $koneksi->query($query);

    if ($result && $result->num_rows > 0) {
        // Jika data user ditemukan, ambil ID pengguna dan setel dalam sesi
        $user_data = $result->fetch_assoc();
        $id_user = $user_data['id_user'];
        $_SESSION['id_user'] = $id_user;

        // Redirect ke homepage atau halaman lainnya
        header("Location: Homepage.php");
        exit();
    } else {
        // Jika login gagal, mungkin tampilkan pesan error atau redirect ke halaman login
        echo "Login failed";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.html"); 
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
    <link rel="stylesheet" href="style/Homepage.css">
</head>
<body>
    <!-- HEADER -->
    <section class="welcome">
        <nav>
            <a href="Homepage.html"><img src="assets/LogoM360W.png" alt="Merapi360" width="200"></a>
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
                            <a href="ProfilePage.php">Profil</a>
                            <a href="">Keranjang</a>
                            <a href="">Favorit</a>
                            <a href="?logout">Logout</a>
                        </div>
                    </div>
                </ul>
            </div>

            <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        ?>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>

        <div class="mid-text">
            <h1>Selamat Datang, <?php echo $username; ?>!</h1>
            <p>Jelajahi tiap tempat wisata di sekitar Gunung Merapi bersama kami</p>
            <a href="" class="kotakBtn">Telusuri Sekarang</a>
        </div>

        <?php
        }
        ?>
    </section>


    <!-- CONTENT -->
    <section class="content">
        <h1>Pilih Kota Tujuan Anda</h1>
        <p>lorem ipsum dolor sit amet</p>

        <div class="package">
            <div class="package-col">
                <div class="image">
                    <a href="PaketJogja.php">
                        <img src="assets/jogja.jpg" alt="">
                    </a>
                </div>
                <h3>Jogjakarta</h3>
                <p>Lorem ipsum dolor sit amet</p>
            </div>

            <div class="package-col">
                <div class="image">
                    <a href="paketMagelang.php">
                        <img src="assets/magelang.jpg" alt="">
                    </a>
                </div>
                <h3>Magelang</h3>
                <p>Lorem ipsum dolor sit amet</p>
            </div>

            <div class="package-col">
                <div class="image">
                    <a href="paketKlaten.php">
                        <img src="assets/klaten.jpg" alt="">
                    </a>
                </div>
                <h3>Klaten</h3>
                <p>Lorem ipsum dolor sit amet</p>
            </div>

            <div class="package-col">
                <div class="image">
                    <a href="paketBoyolali.php">
                        <img src="assets/boyolali.jpg" alt="">
                    </a>
                </div>
                <h3>Boyolali</h3>
                <p>Lorem ipsum dolor sit amet</p>
            </div>
        </div>
    </section>

    <!-- LAPOR -->
    <section class="lapor">
        <h1>Jika ada kendala, jangan ragu untuk hubungi kami</h1>
        <a href="" class="kotakBtn">Hubungi Kami</a>
    </section>

    <!-- KERJASAMA -->
    <div class="kerjasama">
        <h2>Rekan Kami</h2>
        <img src="assets/djawir/kerja-sama/parwis-jogja.png" alt="">
        <img src="assets/djawir/kerja-sama/klaten.png" alt="">
        <img src="assets/djawir/kerja-sama/jateng.png" alt="">
        <img src="assets/djawir/kerja-sama/boyolali.png" alt="">
        <img src="assets/djawir/kerja-sama/LOGO_COFFEE_PAID._NEW-1-removebg-preview.png" alt="">
    </div>


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

    <script src="script/Homepage.js"></script>
</body>
</html>