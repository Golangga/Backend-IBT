<?php
session_start();
include('components/header.php');

// Di bagian atas halaman login_admin.php atau sebelum form login
if (isset($_SESSION['login_error'])) {
    echo '<div class="alert alert-danger text-center">' . $_SESSION['login_error'] . '</div>';
    unset($_SESSION['login_error']); // Hapus pesan setelah ditampilkan
}

?>

<!-- Konten utama halaman -->
<div class="container d-flex flex-column justify-content-center align-items-center flex-grow-1">
    <div class="card shadow p-5" style="background-color: #EAEAEA; max-width: 700px; width: 100%; border-radius: 20px">
        <h2 class="text-center text-danger">ADMIN</h2><br>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $error; ?></strong><br>
                <ul>
                    <li>Username atau password salah.</li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <form method="POST" action="proses_admin.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required style="border-radius: 20px">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger w-25 rounded-pill">Login</button>
            </div>
        </form>
    </div>
</div>
<div class="row w-100 mt-3">
    <div class="col text-end pe-0">
        <a href="index.php" class="text-danger text-decoration-none">Halaman Utama</a>
    </div>
</div>

<?php include('components/footer.php'); ?>
