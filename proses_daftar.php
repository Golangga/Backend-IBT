<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $notelpon = $_POST['notelpon'];
    $email = $_POST['email'];
    $universitas = $_POST['universitas'];
    $fakultas = $_POST['fakultas'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];

    // Menangani upload file
    $photo = null;
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $photo = file_get_contents($_FILES['profile_picture']['tmp_name']);
    } else {
        $_SESSION['message'] = "Terjadi kesalahan saat mengunggah foto.";
        $_SESSION['success'] = false;
        header('Location: daftar.php');
        exit();
    }

    // Query untuk menyimpan data dengan prepared statements
    $query = "INSERT INTO users (nik, password, name, email, notelpon, universitas, fakultas, jurusan, semester, photo) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssisssis', $nik, $password, $nama, $email, $notelpon, $universitas, $fakultas, $jurusan, $semester, $photo);

    try {
        if ($stmt->execute()) {
            $_SESSION['message'] = "Pendaftaran berhasil!";
            $_SESSION['success'] = true;
            header('Location: daftar.php');
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) { // 1062 adalah kode error untuk Duplicate entry
            $_SESSION['message'] = "Pendaftaran gagal: NIK sudah digunakan.";
        } else {
            $_SESSION['message'] = "Pendaftaran gagal: " . $stmt->error;
        }
        $_SESSION['success'] = false;
        header('Location: daftar.php');
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
