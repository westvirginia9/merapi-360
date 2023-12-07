<?php
include "php/koneksi.php";

session_start();

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");


$query = "SELECT nama_paket, deskripsi, harga, gambar FROM paket WHERE id_paket = 1"; // Sesuaikan dengan kondisi Anda
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_paket = $row['nama_paket'];
    $deskripsi = $row['deskripsi'];
    $harga = $row['harga'];
} else {
    echo "Data tidak ditemukan";
}

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $query_user = "SELECT nama_lengkap FROM user WHERE id_user = $id_user";
    $result_user = $koneksi->query($query_user);

    if ($result_user->num_rows > 0) {
        $row_user = $result_user->fetch_assoc();
        $nama_lengkap = $row_user['nama_lengkap'];
    } else {
        echo "Data pengguna tidak ditemukan";
    }
} else {
    echo "ID pengguna tidak ada dalam sesi.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/form_beli.css">
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
                                <a href="ProfilePage.php">Profil</a>
                                <a href="">Keranjang</a>
                                <a href="">Favorit</a>
                                <a href="?logout">Logout</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </nav>

            <div class="mid-text">
                <h1>Bayar Sekarang</h1>
                <p>Untuk segera nikmati perjalanan Anda</p>
            </div>
    </section>

    <!-- CONTENT -->
    <section class="content">
        <div class="kiri">
            <h1>Pesanan Anda</h1>
            <div class="ctr-kiri">
                <div class="img-pesanan">
                <?php echo '<img src="admin/uploads/' . $row['gambar'] . '" alt="' . $row['nama_paket'] . '" style="width:80%">'; ?>
                </div>
                <form action="proses_beli.php" method="post">
                    <div class="desc-pesanan">
                        <p>Paket Wisata: <?php echo $nama_paket; ?></p>
                        <p>Deskripsi: <?php echo $deskripsi; ?></p>
                        <p>Tanggal Berlibur:</p>
                        <p>Nama Pembeli: <?php echo $nama_lengkap; ?></p>

                        <div class="qty-control">
                            <p>Jumlah Tiket:</p>
                            <button onclick="updateQuantity(-1)">-</button>
                            <input type="text" id="quantity" value="1" oninput="updateQuantity()">
                            <button onclick="updateQuantity(1)">+</button>
                        </div>

                        
                    </div>
            </div>

            
        </div>

                        <div class="kanan">
                            <div class="box-kanan">
                                <h1>Ringkasan Pesanan</h1>
                                <p id="hargaTiket">Harga Tiket (satuan) : Rp <?php echo $harga; ?></p>
                                <input type="hidden" id="hargaSatuan" value="<?php echo $harga; ?>">
                                <p id="totalPembelian">Total Pembelian :</p>
                                <p id="mp">Metode Pembayaran :</p>
                                <p id="totalHarga">Total Harga : Rp 0</p>

                                <input type="hidden" id="totalPembelianInput" value="0">

                                <input type="submit" value="Bayar">
                            </div>
                        </div>
                </form>

    </section>

    <script src="script/form_beli.js"></script>
</body>
</html>