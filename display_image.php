<?php
include 'db.php';

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    $result = $conn->query("SELECT photo FROM users WHERE nik = '$nik'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (!empty($row['photo'])) {
            // Jika ada foto di database, tampilkan foto tersebut
            header("Content-Type: image/jpeg");
            echo $row['photo'];
        } else {
            // Jika tidak ada foto, tampilkan gambar default (logo.png)
            header("Content-Type: image/png");
            readfile('img/oranghitam.png');
        }
    } else {
        // Jika pengguna tidak ditemukan, tampilkan gambar default (logo.png)
        header("Content-Type: image/png");
        readfile('img/oranghitam.png');
    }
}
?>
