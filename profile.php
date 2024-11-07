<?php
session_start();

// Pastikan user telah login
if (!isset($_SESSION['nik']) || !isset($_SESSION['name'])) {
    header('Location: index.php'); // Arahkan ke halaman login jika belum login
    exit();
}

// Mengimpor file koneksi database
include 'db.php';

// Mengambil data user berdasarkan NIK dari session
$nik = $_SESSION['nik'];
$sql = "SELECT * FROM users WHERE nik='$nik'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $universitas = $row['universitas'];
    $fakultas = $row['fakultas'];
    $jurusan = $row['jurusan'];
    $semester = $row['semester'];
    $notelpon = $row['notelpon'];
    $akses_ujian = $row['akses_ujian'];

    // Menambahkan angka 0 jika nomor tidak dimulai dengan 0
    if (substr($notelpon, 0, 1) !== '0') {
        $notelpon = '0' . $notelpon;
    }

} else {
    echo 'User tidak ditemukan.';
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
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
        <div align="center">
            <h2 align="center">TES POTENSI AKADEMIK</h2>
            <div class="card">
                <div class="info">
                    <div>
                        <tr>
                            <th>
                                NIK &emsp; &emsp; &emsp; &emsp; &ensp;:
                            </th>
                            <td>
                                <?php echo $_SESSION['nik']; ?>
                            </td>
                        </tr>
                    </div>
                <div class="photo-upload">
                    <!-- Menampilkan gambar profil -->
                    <img align="right" src="display_image.php?nik=<?php echo $_SESSION['nik']; ?>" alt="Foto Profil" class="profile-photo">
                </div>

                    <div style="margin-top: 10px;">
                        <tr>
                            <th>
                                NAMA &emsp; &emsp; &emsp; &ensp;:
                            </th>
                            <td>
                                <?php echo $_SESSION['name']; ?>
                            </td>
                        </tr>
                    </div>

                    <div style="margin-top: 10px;">
                        <tr>
                            <th>
                                EMAIL &emsp; &emsp; &emsp; &ensp;:
                            </th>
                            <td>
                                <?php echo $_SESSION['email']; ?>
                            </td>
                        </tr>
                    </div>

                    <div style="margin-top: 10px;">
                        <tr>
                            <th>
                                NO HP &emsp; &emsp; &emsp; &nbsp;:
                            </th>
                            <td>
                                <?php echo $notelpon; ?>
                            </td>
                        </tr>
                    </div>

                    <!-- Tambahan Info -->
                    <div style="margin-top: 10px;">
                        <tr>
                            <th>
                                UNIVERSITAS &ensp;:
                            </th>
                            <td>
                                <?php echo $universitas; ?>
                            </td>
                        </tr>
                    </div>

                    <div style="margin-top: 10px;">
                        <tr>
                            <th>
                                FAKULTAS &emsp; &emsp;:
                            </th>
                            <td>
                                <?php echo $fakultas; ?>
                            </td>
                        </tr>
                    </div>

                    <div style="margin-top: 10px;">
                        <tr>
                            <th>
                                JURUSAN &emsp; &emsp;:
                            </th>
                            <td>
                                <?php echo $jurusan; ?>
                            </td>
                        </tr>
                    </div>

                    <div style="margin-top: 10px;">
                        <tr>
                            <th>
                                SEMESTER &emsp; &nbsp;:
                            </th>
                            <td>
                                <?php echo $semester; ?>
                            </td>
                        </tr>
                    </div>
                </div>
                
            </div>
            <div class="action-buttons">
                <button class="btn-logout" onclick="window.location.href='logout.php'">Logout</button>
                <?php if ($akses_ujian == 1): ?>
                    <button class="btn-action btn-start" onclick="window.location.href='peraturan.php'">Mulai Tes</button>
                <?php else: ?>
                    <button class="btn-action btn-start" disabled>Akses Ujian Ditolak</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer red-line">
            <span>Dinas Kependudukan dan Pencatatan Sipil Kota Semarang</span>
        </div>
    </div>
</body>
</html>
