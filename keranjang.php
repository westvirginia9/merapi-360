<?php
session_start();

include "php/koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paket = $_POST['id_paket'];
    $quantity = $_POST['quantity'];
    $harga = $_POST['harga'];
    $total_pembelian = $quantity * $harga;

    // Cek apakah item sudah ada di keranjang
    $item_exists = false;
    $index = 0;

    if (isset($_SESSION['keranjang'])) {
        foreach ($_SESSION['keranjang'] as $key => $item) {
            if ($item['id_paket'] == $id_paket) {
                $item_exists = true;
                $index = $key;
                break;
            }
        }
    }

    // Jika item sudah ada di keranjang, update quantity dan total_pembelian
    if ($item_exists) {
        $_SESSION['keranjang'][$index]['quantity'] += $quantity;
        $_SESSION['keranjang'][$index]['total_pembelian'] += $total_pembelian;
    } else {
        // Jika item belum ada di keranjang, tambahkan sebagai item baru
        $item = array(
            'id_paket' => $id_paket,
            'quantity' => $quantity,
            'harga' => $harga,
            'total_pembelian' => $total_pembelian
        );

        $_SESSION['keranjang'][] = $item;
    }

    // Redirect kembali ke halaman keranjang
    header("Location: keranjang.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="stylesheet" href="style/keranjang.css">
</head>
<body>
    <section class="content">
        <div class="keranjang-container">
            <h1>Keranjang Belanja</h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Quantity</th>
                        <th>Harga (per tiket)</th>
                        <th>Total Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['keranjang']) && !empty($_SESSION['keranjang'])) {
                        $no = 1;
                        foreach ($_SESSION['keranjang'] as $item) {
                            $id_paket = $item['id_paket'];
                            $query = "SELECT nama_paket FROM paket WHERE id_paket = $id_paket";
                            $result = $koneksi->query($query);

                            if ($result->num_rows > 0) {
                                $data_paket = $result->fetch_assoc();
                                $nama_paket = $data_paket['nama_paket'];

                                echo "<tr>";
                                echo "<td>{$no}</td>";
                                echo "<td>{$nama_paket}</td>";
                                echo "<td>{$item['quantity']}</td>";
                                echo "<td>Rp {$item['harga']}</td>";
                                echo "<td>Rp {$item['total_pembelian']}</td>";
                                echo "</tr>";
                                $no++;
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>Keranjang kosong</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
