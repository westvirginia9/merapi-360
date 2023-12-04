<?php
session_start();

include "php/koneksi.php";

if (isset($_SESSION['username'])) {
    $username_session = $_SESSION['username'];
    // Lanjutkan dengan logika pembaruan profil
} else {
    echo "Username tidak ada dalam sesi.";
    // Redirect atau tindakan lain jika diperlukan
    exit();
}

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

// Mendapatkan username dari sesi
if (isset($_SESSION['username'])) {
    $username_session = $_SESSION['username'];

    // Memeriksa apakah tombol "Simpan" diklik
    if (isset($_POST['simpan'])) {
        // Memeriksa apakah kunci "username" ada di array $_POST
        if (isset($_POST['username'])) {
            $username_post = $_POST['username'];

            // Memeriksa apakah username sesuai dengan username dalam sesi
            if ($username_post == $username_session) {
                // Mengambil data dari formulir
                $nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap'] : '';
                $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
                $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $no_telfon = isset($_POST['no_telfon']) ? $_POST['no_telfon'] : '';

                // Memeriksa apakah kunci "foto_profil" ada di array $_FILES
                if (isset($_FILES['foto_profil'])) {
                    // Mengambil informasi file
                    $file_name = $_FILES['foto_profil']['name'];
                    $file_tmp = $_FILES['foto_profil']['tmp_name'];

                    // Lakukan pengolahan file sesuai kebutuhan Anda (upload ke folder tertentu, dll.)
                    // ...

                    // Simpan informasi file ke database (jika diperlukan)
                    // ...
                }

                // Query SQL untuk melakukan UPDATE pada tabel user
                $sql = "UPDATE user SET
                        nama_lengkap = '$nama_lengkap',
                        jenis_kelamin = '$jenis_kelamin',
                        alamat = '$alamat',
                        email = '$email',
                        no_telfon = '$no_telfon'
                        WHERE username = '$username_session'";

                // Lakukan query UPDATE
                $update_result = $koneksi->query($sql);

                // Lakukan penanganan error jika query tidak berhasil
                if (!$update_result) {
                    echo "Error: " . $koneksi->error;
                } else {
                    echo "Perubahan profil berhasil disimpan.";
                }
            } else {
                echo "Username tidak sesuai.";
            }
        } else {
            echo "Kunci 'username' tidak ada di dalam array \$_POST.";
        }
    } else {
        echo "Tombol 'Simpan' tidak diklik.";
    }
} else {
    echo "Username tidak ada dalam sesi.";
}

$koneksi->close();
?>
