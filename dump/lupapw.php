<?php include('components/header.php'); ?>

<!-- Konten utama halaman -->
 

<div class="container d-flex flex-column justify-content-center align-items-center flex-grow-1">
    <div class="card shadow p-5" style="background-color: #EAEAEA; max-width: 700px; width: 100%; border-radius: 20px">
        <h2 class="text-center text-danger">Lupa Password</h2><br>
        <form>
            <div class="mb-3">
                <label for="nik" class="form-label">Nomer Induk Kependudukan (NIK)</label>
                <input type="text" class="form-control" id="nik" placeholder="Masukan NIK Anda" style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" style="border-radius: 20px" placeholder="Masukan Email" required >
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger w-25 rounded-pill">Login</button>
            </div>
        </form>
    </div>
</div>



<?php include('components/footer.php'); ?>