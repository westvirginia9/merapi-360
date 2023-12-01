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
                            <a href="">Profil</a>
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
                    <a href="">
                        <img src="assets/magelang.jpg" alt="">
                    </a>
                </div>
                <h3>Magelang</h3>
                <p>Lorem ipsum dolor sit amet</p>
            </div>

            <div class="package-col">
                <div class="image">
                    <a href="">
                        <img src="assets/klaten.jpg" alt="">
                    </a>
                </div>
                <h3>Klaten</h3>
                <p>Lorem ipsum dolor sit amet</p>
            </div>

            <div class="package-col">
                <div class="image">
                    <a href="">
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