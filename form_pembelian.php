<?php

session_start();

include "php/koneksi.php";

if (isset($_GET['id'])) {
    $id_paket = $_GET['id'];

    $query = "SELECT * FROM paket WHERE id_paket = $id_paket";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id_paket'] = $row['id_paket'];
        $_SESSION['harga_paket'] = $row['harga'];
        $_SESSION['gambar_paket'] = $row['gambar']; // Tambahkan informasi gambar
    } else {
        // Tindakan jika informasi paket tidak ditemukan (bisa menampilkan pesan kesalahan)
        header("Location: PaketJogja.php");
        exit();
    }
} else {
    // Tindakan jika parameter ID tidak ditemukan (bisa menampilkan pesan kesalahan)
    header("Location: PaketJogja.php");
    exit();
}

// Pastikan variabel $harga_paket dan $gambar_paket telah didefinisikan sebelum digunakan
if (!isset($_SESSION['harga_paket']) || !isset($_SESSION['gambar_paket'])) {
    // Tindakan jika variabel belum didefinisikan (bisa menampilkan pesan kesalahan)
    header("Location: PaketJogja.php");
    exit();
}

$harga_paket = $_SESSION['harga_paket'];
$gambar_paket = $_SESSION['gambar_paket'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pembelian</title>
    <link rel="stylesheet" href="style/payment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 p-5">
                    <img src="admin/uploads/<?php echo $gambar_paket; ?>" alt="gambar paket" style="width:100%">
</div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                        <?php
    // Cek apakah ada parameter id pada URL
    if (isset($_GET['id'])) {
        // Ambil id paket dari URL
        $id_paket = $_GET['id'];

        // Query untuk mendapatkan data paket berdasarkan id
        $query = "SELECT * FROM paket WHERE id_paket = $id_paket";
        $result = $koneksi->query($query);

        // Tampilkan nama paket dan kapasitas jika data ditemukan
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<p class="h4 m-0">' . $row['nama_paket'] . '</p>';

            // Periksa apakah kolom 'kapasitas' ada dalam hasil query
            if (isset($row['kapasitas'])) {
                echo '<p class="ps-3 text-muted">' . $row['kapasitas'] . '</p>';
            } else {
                echo '<p class="ps-3 text-muted">N/A</p>';
            }
        }
    } else {
        // Tampilkan teks default jika tidak ada parameter id pada URL
        echo '<p class="h4 m-0">Paket Tidak Dipilih</p>';
        echo '<p class="ps-3 text-muted">N/A</p>';
    }
    ?>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Qty</p>
                            <p class="fs-14 fw-bold">1</p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Subtotal</p>
                            <span class="h4"><?php echo $harga_paket; ?></span>
                        </div>
                        
                        
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Total</p>
                            <div class="d-flex align-text-top ">
                            <span class="h4"><?php echo $harga_paket; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0">
                        
                        <div class="row m-0">
                            <div class="col-12  mb-4 p-0">
                                <div class="btn btn-primary">Purchase<span class="fas fa-arrow-right ps-2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>