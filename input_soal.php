<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-[#FE4343] h-[100px] shadow-lg flex items-center justify-center">
        <div class="container mx-auto flex items-center justify-between">
            <a href="./index.php" class="flex mx-12">
                <img src="img/logo.png" alt="Logo" class="h-[69px] h[420px] mr-4">
                <div>
                    <span class="text-white fw-bold">DINAS KEPENDUDUKAN DAN</span><br>
                    <span class="text-white fw-bold">PENCATATAN SIPIL</span><br>
                    <span class="text-white small ">KOTA SEMARANG</span>
                </div>
            </a>
            <div class="text-white flex space-x-4">
                <a href="login_admin.php" class="px-4">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Sidebar and Content -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-1/6 bg-[#FF8B8B] min-h-full p-6">
            <ul class="text-white">
                <li class="mb-4">
                    <a href="admin_dashboard.php" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Daftar Peserta</a>
                </li>
                <li class="mb-4">
                    <a href="scores.php" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Daftar Nilai</a>
                </li>
                <li class="mb-4">
                    <a href="daftar_soal.php" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Daftar Soal</a>
                </li>
                <li class="mb-4">
                    <a href="input_soal.php" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Input Soal</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="w-5/6 p-6">
            <h1 class="text-2xl font-bold mb-6">Input Soal</h1>

            <!-- Notifikasi Sukses -->
            <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                <div id="success-notification" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p class="font-bold">Sukses</p>
                    <p>Soal berhasil disimpan.</p>
                </div>
            <?php endif; ?>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-4">Input Soal Pilihan Ganda</h2>

                <form action="submit_soal.php" method="POST">
                    <!-- Input Soal -->
                    <div class="mb-4">
                        <label for="soal" class="block text-gray-700 text-sm font-bold mb-2">Soal:</label>
                        <textarea id="soal" name="soal" rows="4" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required></textarea>
                    </div>

                    <!-- Input Jawaban A -->
                    <div class="mb-4">
                        <label for="jawaban_a" class="block text-gray-700 text-sm font-bold mb-2">Jawaban A:</label>
                        <input id="jawaban_a" name="jawaban_a" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required>
                    </div>

                    <!-- Input Jawaban B -->
                    <div class="mb-4">
                        <label for="jawaban_b" class="block text-gray-700 text-sm font-bold mb-2">Jawaban B:</label>
                        <input id="jawaban_b" name="jawaban_b" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required>
                    </div>

                    <!-- Input Jawaban C -->
                    <div class="mb-4">
                        <label for="jawaban_c" class="block text-gray-700 text-sm font-bold mb-2">Jawaban C:</label>
                        <input id="jawaban_c" name="jawaban_c" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required>
                    </div>

                    <!-- Input Jawaban D -->
                    <div class="mb-4">
                        <label for="jawaban_d" class="block text-gray-700 text-sm font-bold mb-2">Jawaban D:</label>
                        <input id="jawaban_d" name="jawaban_d" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required>
                    </div>

                    <!-- Input Jawaban E -->
                    <div class="mb-4">
                        <label for="jawaban_e" class="block text-gray-700 text-sm font-bold mb-2">Jawaban E:</label>
                        <input id="jawaban_e" name="jawaban_e" type="text" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required>
                    </div>

                    <!-- Pilihan Jawaban Benar -->
                    <div class="mb-4">
                        <label for="jawaban_benar" class="block text-gray-700 text-sm font-bold mb-2">Jawaban Benar:</label>
                        <select id="jawaban_benar" name="jawaban_benar" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>

                    <!-- Tombol Submit -->
                    <div>
                        <button type="submit" class="bg-[#FE4343] text-white px-4 py-2 rounded-lg hover:bg-red-600">Simpan Soal</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <footer class="mt-auto bg-[#FE4343] text-white text-center py-2">
        <div class="container">
            Dinas Kependudukan dan Pencatatan Sipil Kota Semarang
        </div>
    </footer>
    <script>
        setTimeout(function() {
            var notification = document.getElementById('success-notification');
            if (notification) {
                notification.style.display = 'none';
            }
        }, 3000); // 3000 ms = 3 detik
    </script>
</body>

</html>
