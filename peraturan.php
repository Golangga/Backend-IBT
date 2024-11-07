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
            <h3 align="center">PERATURAN</h3>
            <h3 align="center" style="margin-top: 0px">Mengerjakan Soal</h3>
            <div align="center">
                <div class="card">
                    <div class="info">
                        <form>
                            <p>1. Setiap peserta diberikan waktu 90 Menit untuk menjawab semua soal</p>
                            <p>2. Setelah peserta menekan tombol “mulai” maka waktu akan langsung menghitung mundur</p>
                            <p>3. Setiap peserta dilarang untuk mencotek dan browsing</p>
                            <p>4.Jika waktu habis maka akan dianggap selesai dan seluruh peserta akan dibawa ke halaman log out</p>
                        </form>
                    </div>
                </div>
                <div class="action-buttons">
                <a href="profile.php"><button class="btn-start">Kembali</button></a>
                <a href="tutorial.php"><button class="btn-start">Selanjutnya</button></a>
            </div>
            </div>   

        <div class="footer red-line">
            <span>Dinas Kependudukan dan Pencatatan Sipil Kota Semarang</span>
        </div>
    </div>
</body>
</html>