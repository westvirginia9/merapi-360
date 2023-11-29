<?php

include "php/koneksi.php";

function getPackages($koneksi) {
    $sql = "SELECT * FROM paket";
    $result = $koneksi->query($sql);
    $packages = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $packages[] = $row;
        }
    }

    return $packages;
}

$packages =getPackages($koneksi);

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    if (isset($_POST["add_package"])) {
        $nama_paket = $_POST["nama_paket"];
        $deskripsi = $_POST["deskripsi"];
        $harga = $_POST["harga"];
        $gambar = uploadImage();

        $sql = "INSERT INTO paket (nama_paket, deskripsi, harga, gambar) VALUES ('$nama_paket', '$deskripsi', $harga, '$gambar') ";
        $koneksi->query($sql);
    } elseif (isset($_POST["edit_package"])) {
        $paket_id = $_POST["paket_id"];
        $nama_paket = $_POST["nama_paket"];
        $deskripsi = $_POST["deskripsi"];
        $harga = $_POST["harga"];
        $gambar = uploadImage();

        $sql = "UPDATE paket SET nama_paket='$nama_paket',deskripsi='$deskripsi',harga='$harga',gambar='$gambar' WHERE paket_id=$paket_id";
        $koneksi->query($sql);
    }
    
    elseif (isset($_POST["delete_package"])) {
        $paket_id = isset($_POST["delete_package"]) ? $_POST["delete_package"]: '';

        if ($paket_id === '') {
            echo "Paket ID tidak valid.";
            exit();
        }

        $paket_id = mysqli_real_escape_string($koneksi, $paket_id);
        

        $sql = "DELETE FROM paket WHERE paket_id=$paket_id";
        echo "SQL Query: " . $sql;

        if ($koneksi->query($sql)===TRUE) {
            echo "Paket berhasil dihapus";
        } else {
            echo "error: " . $koneksi->error;
        }
    }

    header("Location: ".$_SERVER['PHP_SELF'] );
    exit();
}

function uploadImage() {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
    $uploadOk= 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "file bukan gambar!";
            $uploadOk = 0;
        }
    }
    
    if (file_exists($targetFile)) {
        echo "Maaf, file sudah ada";
        $uploadOk = 0;
    }

    if ($_FILES["gambar"]["size"] > 500000) {
        echo "maaf ukuran terlalu besar";
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Maaf, tipe file tidak diperbolehkan";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Maaf, file tidak diunggah";
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            return basename($_FILES["gambar"]["name"]);
        } else {
            echo "Maaf, kesalahan saat mengunggah file.";
        }
    }
    return "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tambahan header yang diperlukan (CSS, dll.) -->
    <title>Admin Dashboard</title>
</head>
<body>

    <h1>Admin Dashboard</h1>

    <!-- Formulir untuk menambah paket -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Tambah Paket Baru</h2>
        <label for="nama_paket">Nama Paket:</label>
        <input type="text" name="nama_paket" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" rows="4"></textarea>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" required>

        <!-- Dalam formulir tambah paket -->
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" accept="image/*">

        <button type="submit" name="add_package">Tambah Paket</button>
    </form>

    <!-- Daftar Paket -->
    <h2>Daftar Paket</h2>
    <ul>
        <?php foreach ($packages as $package): ?>
            <li>
                <?php echo $package["nama_paket"]; ?> - 
                <?php echo $package["deskripsi"]; ?> - 
                Harga: <?php echo $package["harga"]; ?> -
                <?php if (!empty($package["gambar"])): ?>
                    <img src="uploads/<?php echo $package["gambar"]; ?>" alt="Gambar Paket" style="max-width: 50px;">
                <?php endif; ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display:inline;">
                    <input type="hidden" name="delete_package" value="<?php echo $package["paket_id"]; ?>">
                    <button type="submit">Hapus</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Tambahan bagian yang diperlukan (footer, dll.) -->

</body>
</html>