<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Selesaikan Ujian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="selesaikan-page">
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
        <div class="confirmation-box">
            <h3>Apakah Anda Yakin Untuk Menyelesaikan Ujian?</h3>
            <!-- Tombol "YA" mengarahkan ke proses_selesai.php -->
            <form method="POST" action="proses_selesai.php">
                <button type="submit" class="button yes">YA</button>
            </form>
            <!-- Tombol "TIDAK" kembali ke halaman Soal.php -->
            <a href="Soal.php"><button class="button no">TIDAK</button></a>
        </div>

        <div class="footer red-line">
            <span>Dinas Kependudukan dan Pencatatan Sipil Kota Semarang</span>
        </div>
    </div>
</body>
</html>
