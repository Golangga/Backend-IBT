<?php
include 'db.php'; // Koneksi ke database
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $foto = $_FILES['foto'];

    // Pastikan file yang diunggah adalah gambar
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($foto['type'], $allowedTypes)) {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Format file tidak didukung. Gunakan JPG, PNG, atau GIF.</div>';
        header('Location: profile.php');
        exit();
    }

    // Baca file foto ke dalam bentuk biner
    $imageData = file_get_contents($foto['tmp_name']);

    // Perbarui foto profil di database
    $stmt = $conn->prepare("UPDATE users SET photo = ? WHERE nik = ?");
    $stmt->bind_param("ss", $imageData, $nik);

    if ($stmt->execute()) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Foto profil berhasil diunggah!</div>';
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Terjadi kesalahan saat mengunggah foto.</div>';
    }

    $stmt->close();
    $conn->close();

    header('Location: profile.php');
    exit();
}
?>
