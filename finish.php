<?php
session_start();
include 'db.php';

// Cek jika tombol logout ditekan
if (isset($_POST['logout'])) {
    // Hapus semua sesi
    session_unset();
    session_destroy();

    // Redirect ke halaman login atau halaman utama
    header("Location: index.php"); // Ganti dengan halaman yang sesuai
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finish Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="finish-page">
    <div class="container">
        <div class="header">
            <img src="img/Logo.png" alt="Logo">
            <div class="text-left">
                <span>Dinas Kependudukan dan Pencatatan Sipil<br>Kota Semarang</span>
            </div>
            <div class="text-right">
                <?php 
                $nik = isset($_SESSION['nik']) ? $_SESSION['nik'] : ''; 
                $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Nama tidak ditemukan';
                ?>
                <div class="user-profile">
                    <img src="display_image.php?nik=<?php echo $nik; ?>" alt="User Photo" class="user-photo">
                    <div class="user-info">
                        <span class="user-nik"><?php echo $nik; ?></span><br>
                        <span class="user-name"><?php echo $name; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="confirmation-box">
                <h3>Terima Kasih Telah Melaksanakan Tes</h3>
                <!-- Form untuk logout -->
                <form method="POST" action="">
                    <button type="submit" name="logout" class="button logout">LOGOUT</button>
                </form>
            </div>
        </div>
        <div class="footer red-line">
            <span>Dinas Kependudukan dan Pencatatan Sipil Kota Semarang</span>
        </div>
    </div>
</body>
</html>
