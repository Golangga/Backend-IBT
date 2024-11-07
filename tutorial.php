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
            <h3 align="center">TUTORIAL</h3>
            <div align="center">
                <div class="card">
                    <div class="info">
                        <form>
                            <p>1. Sebelum memulai mengerjakan, berdoa terlebih dahulu</p>
                            <p>2. Setelah anda klik mulai mengerjakan, maka waktu mundur akan lagsung dimulai</p>
                            <p>3. Kerjakan soal dari yang menurut anda paling mudah</p>
                            <p>4. Pada navigasi soal warna abu-abu merupakan soal yang belum anda kerjakan, warna hijau muda merupakan soal yang sudah anda kerjakan, warna hijau tua menampilkan soal yang terbuka</p>
                            <p>5. Melanjutkan soal dengan menekan tombol “Soal Selanjutnya”. Kembali ke soal sebelumya “Soal Sebelumnya”. Anda dapat berpindah soal dengan navigasi soal</p>
                            <p>6. Untuk selesai anda bisa menekan tombol “Selesaikan” pada navigasi soal</p>
                            <p>7. Pastikan semua soal terjawab</p>
                            <p>8. Anda dikatakan selesai mengerjakan jika sudah logout atau waktu habis</p>
                        </form>
                    </div>
                </div>
                <div class="action-buttons">
                <a href="peraturan.php"><button class="btn-start">Kembali</button></a>
                <a href="Soal.php"><button class="btn-start">Mulai</button></a>
            </div>
            </div>
            
            

        <div class="footer red-line">
            <span>Dinas Kependudukan dan Pencatatan Sipil Kota Semarang</span>
        </div>
    </div>
</body>
</html>