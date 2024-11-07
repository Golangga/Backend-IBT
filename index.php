<?php 
include('components/header.php'); 

session_start(); // Memulai sesi untuk menyimpan pesan kesalahan

// Menampilkan pesan kesalahan jika ada
if (isset($_SESSION['login_error'])) {
    echo '<div class="alert alert-danger text-center">' . $_SESSION['login_error'] . '</div>';
    unset($_SESSION['login_error']); // Hapus pesan setelah ditampilkan
}
?>

<!-- Konten utama halaman -->
<div class="container d-flex flex-column justify-content-center align-items-center flex-grow-1">
    <div class="card shadow p-5" style="background-color: #EAEAEA; max-width: 700px; width: 100%; border-radius: 20px">
        <h2 class="text-center text-danger">LOGIN</h2><br>
        
        <!-- Form login yang mengarah ke test.php untuk proses login -->
        <form method="POST" action="proses_login.php">
            <div class="mb-3">
                <label for="nik" class="form-label">Nomer Induk Kependudukan (NIK)</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK Anda" style="border-radius: 20px" required>
                <div class="invalid-feedback">NIK harus diisi.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" style="border-radius: 20px" placeholder="Masukan Password" required>
                <div class="invalid-feedback">Password harus diisi.</div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger w-25 rounded-pill" name="login">Login</button>
            </div>
        </form>
        
        <div class="row w-100 mt-5">
            <div class="col text-end pe-0">
                <a href="daftar.php" class="text-danger text-decoration-none">Belum Punya Akun?  |  Daftar</a>
            </div>
        </div>
    </div>
</div>

<div class="row w-100 mt-3">
    <div class="col text-end pe-0">
        <a href="login_admin.php" class="text-danger text-decoration-none">Login Operator</a>
    </div>
</div>

<?php include('components/footer.php'); ?>
