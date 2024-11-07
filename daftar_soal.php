<?php
// Memasukkan file konfigurasi database
include('db.php');

// Mengambil data soal dari database
$query = "SELECT * FROM questions";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <span class="text-white small">KOTA SEMARANG</span>
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
        <aside class="w-1/4 bg-[#FF8B8B] min-h-screen p-6">
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
        <main class="w-1/8 p-6">
            <h1 class="text-2xl font-bold mb-6">Daftar Soal</h1>
        <!-- Notifikasi Sukses -->
        <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] == 'updated'): ?>
                    <div id="success-notification" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p class="font-bold">Sukses</p>
                        <p>Soal berhasil diperbarui.</p>
                    </div>
                <?php elseif ($_GET['status'] == 'deleted'): ?>
                    <div id="success-notification" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                        <p class="font-bold">Sukses</p>
                        <p>Soal berhasil dihapus.</p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>  
            <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                <h2 class="text-lg font-semibold mb-4">Soal Pilihan Ganda</h2>

                <table class="min-w-full bg-white">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 border text-center">No</th>
                            <th class="px-4 py-2 border text-center">Soal</th>
                            <th class="px-4 py-2 border text-center">Jawaban A</th>
                            <th class="px-4 py-2 border text-center">Jawaban B</th>
                            <th class="px-4 py-2 border text-center">Jawaban C</th>
                            <th class="px-4 py-2 border text-center">Jawaban D</th>
                            <th class="px-4 py-2 border text-center">Jawaban E</th>
                            <th class="px-4 py-2 border text-center">Jawaban Benar</th>
                            <th class="px-4 py-2 border text-center">Edit</th>
                            <th class="px-4 py-2 border text-center">Delete</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='text-center'>";
                            echo "<td class='px-4 py-2 border'>{$no}</td>";
                            echo "<td class='px-4 py-2 border'>{$row['soal']}</td>";
                            echo "<td class='px-4 py-2 border'>{$row['jawaban_a']}</td>";
                            echo "<td class='px-4 py-2 border'>{$row['jawaban_b']}</td>";
                            echo "<td class='px-4 py-2 border'>{$row['jawaban_c']}</td>";
                            echo "<td class='px-4 py-2 border'>{$row['jawaban_d']}</td>";
                            echo "<td class='px-4 py-2 border'>{$row['jawaban_e']}</td>";
                            echo "<td class='px-4 py-2 border'>{$row['answer']}</td>";
                            echo "<td class='px-4 py-2 border'><a href='edit_soal.php?id={$row['id']}' class='text-blue-600 hover:text-blue-800'><i class='fas fa-edit'></i></a></td>";
                            echo "<td class='px-4 py-2 border'><a href='delete_soal.php?id={$row['id']}' class='text-red-600 hover:text-red-800'><i class='fas fa-trash-alt'></i></a></td>"; // Icon delete
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
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

<?php
// Menutup koneksi ke database
mysqli_close($conn);
?>

