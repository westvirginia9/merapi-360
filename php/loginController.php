<?php
session_start();

include "koneksi.php";

$nama_db = "djawir_db";
$koneksi->query("USE $nama_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($koneksi->connect_error) {
        die("Koneksi ke database gagal: " . $koneksi->connect_error);
    }

    $query = $koneksi->prepare("SELECT * FROM user WHERE username=?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $stored_password = $user_data['password'];

        if ($password == $stored_password) {
            $_SESSION['username'] = $username;
            header("Location: ../Homepage.php");
            exit();
        } else {
            
            $_SESSION['error_message'] = "Password salah.";
            header("Location: ../LoginPage.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Username tidak ditemukan.";
        header("Location: ../LoginPage.php"); 
        exit();
    }

    $koneksi->close();
}
?>
