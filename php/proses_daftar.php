<?php

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$password =($_POST['password']);
$conf_password = ($_POST['conf_password']);
$email = $_POST['email'];
$no_telfon = $_POST['no_telfon'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$query = "INSERT INTO user (nama_lengkap, username, password, conf_password, email, no_telfon, jenis_kelamin) VALUES ('$nama_lengkap', '$username', '$password', '$conf_password', '$email', '$no_telfon', '$jenis_kelamin')";

if (mysqli_query($koneksi, $query)) {
    header('Location: ../LoginPage.php');
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);

?>