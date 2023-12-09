<?php
include "php/koneksi.php";
session_start();

// Memeriksa apakah pengguna sudah login
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    // Mengambil data dari tabel user
    $query_user = "SELECT nama_lengkap, email, no_telfon FROM user WHERE id_user = $id_user";
    $result_user = $koneksi->query($query_user);

    if ($result_user->num_rows > 0) {
        $row_user = $result_user->fetch_assoc();
        $nama_lengkap = $row_user['nama_lengkap'];
        $email = $row_user['email'];
        $no_telfon = $row_user['no_telfon'];
    } else {
        echo "Data pengguna tidak ditemukan";
    }
} else {
    // Jika pengguna belum login, arahkan ke halaman login atau lakukan tindakan lainnya
    header("Location: LoginPage.php");
    exit();
}

// Ambil id_paket dari URL
if (isset($_GET['id'])) {
    $id_paket_dipilih = $_GET['id'];

    // Query untuk mendapatkan informasi paket berdasarkan id_paket
    $query_paket = "SELECT nama_paket, harga, gambar FROM paket WHERE id_paket = $id_paket_dipilih";
    $result_paket = $koneksi->query($query_paket);

    if ($result_paket->num_rows > 0) {
        $row_paket = $result_paket->fetch_assoc();
        $nama_paket = $row_paket['nama_paket'];
        $harga_paket = $row_paket['harga'];
        $gambar = $row_paket['gambar'];

        // Mengambil jumlah tiket dari input pengguna
        if (isset($_POST['jumlah_tiket']) && is_numeric($_POST['jumlah_tiket'])) {
            $jumlah_tiket = intval($_POST['jumlah_tiket']);
        } else {
            // Jika input pengguna tidak valid, atur default ke 1
            $jumlah_tiket = 1;
        }

        // Melakukan perhitungan total harga berdasarkan jumlah tiket
        $total_harga = $harga_paket * $jumlah_tiket;
    } else {
        echo "Data paket tidak ditemukan";
    }
} else {
    // Tindakan jika parameter id tidak ditemukan
    echo "Parameter id tidak ditemukan";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/form_beli.css?v=<?php echo time(); ?>">
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
    <!-- <section class="content">
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

        <div class="kanan">
            <div class="box-kanan">
                <h1>Ringkasan Pesanan</h1>
                <p id="hargaTiket">Harga Tiket (satuan) : Rp <?php echo $harga; ?></p>
                <input type="hidden" id="hargaSatuan" value="<?php echo $harga; ?>">
                <p id="totalPembelian">Total Pembelian :</p>
                <p id="mp">Metode Pembayaran :</p>
                <p id="totalHarga">Total Harga : Rp 0</
                <input type="hidden" id="totalPembelianInput" value="0
                <input type="submit" value="Bayar">
            </div>
        </div>
        </form> 

    </section> -->

    <!-- FORMULIR PEMBAYARAN -->
    <section>
        <form action="" method="post">
        <div class="formulir">
            <div class="datadiri">
                <h1>Data Diri</h1>

                <div class="wrapper">
                    <div class="label-input">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>" placeholder="Masukkan nama lengkap Anda">
                    </div>

                    <div class="label-input">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Masukkan email Anda">
                    </div>

                    <div class="label-input">
                        <label for="telfon">Telepon</label>
                        <input type="text" id="telfon" name="no_telfon" value="<?php echo $no_telfon; ?>" placeholder="Masukkan nomor telepon Anda">
                    </div>

                    <div class="label-input">
                        <label for="pass">Kode Voucher</label>
                        <input type="text" id="kode" placeholder="Masukkan kode voucher Anda (jika memliki)">
                    </div>
                </div>

                <div class="address">
                    <label for="alamat">Alamat</label>
                    <textarea name="" id="alamat" rows="5"></textarea>
                </div>
            </div>

            <div class="pesanan">
                <h1>Detail Pesanan</h1>

                <div class="produk">
                <img src="admin/uploads/<?php echo $gambar; ?>" alt="p">
                <input type="hidden" name="gambar_paket" value="<?php echo $gambar; ?>">
                <input type="text" id="paket" name="nama_paket" value="<?php echo $nama_paket; ?>" placeholder="Nama Paket" disabled>
                    <input type="text" id="harga" name="harga_paket" value="<?php echo $harga_paket; ?>" placeholder="Harga Paket" disabled>
                    <input type="text" id="tiket" name="jumlah_tiket" value="<?php echo $jumlah_tiket; ?>" placeholder="Tiket" >
                </div>

                <div class="total-harga">
                    <label for="total">Total Harga:</label>
                    <input type="text" id="total" name="total_harga" value="<?php echo $total_harga; ?>" placeholder="Jumlah Total" disabled>
                </div>

                <input type="submit" id="bayar" value="Bayar Sekarang">
            </div>
        </div>
        </form>
    </section>

    <script src="script/form_beli.js"></script>
</body>
</html>