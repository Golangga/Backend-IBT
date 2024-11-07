<?php
session_start();

// Pastikan data skor tersedia
if (!isset($_SESSION['total_correct']) || !isset($_SESSION['total_wrong'])) {
    die("Data skor tidak tersedia.");
}

// Ambil data dari session
$totalCorrect = $_SESSION['total_correct'];
$totalWrong = $_SESSION['total_wrong'];
$totalQuestions = $totalCorrect + $totalWrong;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Ujian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="img/Logo.png" alt="Logo">
            <div class="text-left">
                <span>Dinas Kependudukan dan Pencatatan Sipil<br>Kota Semarang</span>
            </div>
        </div>

        <div class="result-box">
            <h3>Hasil Ujian Anda</h3>
            <p>Total Soal: <?php echo $totalQuestions; ?></p>
            <p>Jawaban Benar: <?php echo $totalCorrect; ?></p>
            <p>Jawaban Salah: <?php echo $totalWrong; ?></p>
        </div>

        <div class="footer red-line">
            <span>Dinas Kependudukan dan Pencatatan Sipil Kota Semarang</span>
        </div>
    </div>
</body>
</html>
