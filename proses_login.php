<?php
session_start();
include 'db.php'; // Memastikan koneksi database didefinisikan dengan benar

// Logika Login
if (isset($_POST['login'])) {
    $nik = mysqli_real_escape_string($conn, $_POST['nik']);
    $password = $_POST['password'];

    // Query untuk memeriksa user berdasarkan NIK
    $query = "SELECT * FROM users WHERE nik='$nik' AND status='Active'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data user ke session
            $_SESSION['nik'] = $user['nik'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['notelpon'] = $user['notelpon']; // Pastikan ini sesuai dengan field di database

            // Redirect ke profile.php setelah login
            header('Location: profile.php');
            exit();
        } else {
            $_SESSION['login_error'] = "Login gagal, periksa kembali NIK dan password Anda.";
            header('Location: index.php');
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Login gagal, periksa kembali NIK dan password Anda.";
        header('Location: index.php');
        exit();
    }
} else {
    
    // Jika tidak ada form login yang dikirim, kembalikan ke halaman login
    header('Location: index.php');
    exit();
}
?>
