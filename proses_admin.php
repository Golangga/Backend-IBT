<?php
session_start();
include 'db.php'; // Memastikan koneksi database didefinisikan dengan benar

// Logika Login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query untuk memeriksa username dan password di database
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika login berhasil, simpan session dan arahkan ke dashboard admin
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin_dashboard.php');
        exit(); // Pastikan kode setelah header tidak dijalankan
    } else {
        // Set session untuk menyimpan pesan error
        $_SESSION['login_error'] = "Password salah!";
        header('Location: login_admin.php');
        exit();
    }
} else {
    $_SESSION['login_error'] = "Username tidak ditemukan!";
    header('Location: login_admin.php');
    exit();
}

?>