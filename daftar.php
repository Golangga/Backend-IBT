<?php 
include('components/header.php');

session_start();
if (isset($_SESSION['message'])) {
    $notif_class = isset($_SESSION['success']) && $_SESSION['success'] ? 'notif-success' : 'notif-failure';
    echo "<div id='notif' class='notif $notif_class'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
    unset($_SESSION['success']);
}
?>

<!-- Konten utama halaman -->
<style>
    /* CSS untuk menghilangkan spinner pada input type number */
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .notif {
        padding: 10px;
        border: 1px solid;
        border-radius: 5px;
        margin-bottom: 15px;
        text-align: center;
    }
    .notif-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }
    .notif-failure {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }
</style>
<div class="container d-flex flex-column justify-content-center align-items-center flex-grow-1">
    <div class="card shadow p-5" style="background-color: #EAEAEA; max-width: 800px; width: 100%; border-radius: 20px">
        <h2 class="text-center text-danger">REGISTER</h2><br>
        <form method="POST" action="proses_daftar.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomer Induk Kependudukan (NIK)</label>
                <input type="number" class="form-control" name="nik" placeholder="Masukan NIK Anda" required min="0" style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap Anda" style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" style="border-radius: 20px" placeholder="Masukan Password Anda" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="notelpon" class="form-label">No. Telepon</label>
                    <div class="input-group">
                        <span class="input-group-text" style="border-radius: 20px">+62</span>
                        <input type="number" class="form-control" name="notelpon" placeholder="Masukan No. Telepon Anda" required min="0" style="border-radius: 20px">
                    </div>
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Masukan Email Anda" required style="border-radius: 20px">
                </div>
            </div>
            <!-- Tambahan Inputan -->
            <div class="mb-3">
                <label for="universitas" class="form-label">Universitas</label>
                <input type="text" class="form-control" name="universitas" placeholder="Masukan Universitas Anda" required style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="fakultas" class="form-label">Fakultas</label>
                <input type="text" class="form-control" name="fakultas" placeholder="Masukan Fakultas Anda" required style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan" placeholder="Masukan Jurusan Anda" required style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" class="form-control" name="semester" placeholder="Masukan Semester Anda" required min="1" style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Upload Foto Profil</label>
                <input type="file" class="form-control" name="profile_picture" style="border-radius: 20px" required>
            </div>
            <div class="row w-100 mt-5">
                <div class="col d-flex justify-content-start align-items-center">
                    <a href="index.php" class="text-danger text-decoration-none">Sudah Punya Akun? Login</a>
                </div>
                <div class="col d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-danger w-50 rounded-pill">Daftar Sekarang</button>
                </div>
            </div>
        </form>
        <script>
            // Fungsi untuk menghilangkan notifikasi setelah 3 detik
            setTimeout(function() {
                var notif = document.getElementById('notif');
                if (notif) {
                    notif.style.transition = 'opacity 0.5s ease';
                    notif.style.opacity = '0';
                    setTimeout(function() {
                        notif.remove();
                    }, 500); // Waktu untuk efek transisi menghilangkan elemen
                }
            }, 3000); // 3000 ms = 3 detik
        </script>
    </div>
</div>

<?php include('components/footer.php'); ?>
