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
        <aside class="w-1/6 bg-[#FF8B8B] h-screen p-6">
            <ul class="text-white">
                <li class="mb-4">
                    <a href="#" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Daftar Peserta</a>
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
            <h1 class="text-2xl font-bold mb-6">Daftar Peserta</h1>

            <!-- Tabel Daftar Peserta -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-4">Daftar Peserta</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">No</th>
                                <th class="py-2 px-4 border-b">Nama</th>
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Status</th>
                                <th class="py-2 px-4 border-b">Universitas</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'db.php';

                            $sql = "SELECT * FROM users";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $no = 1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td class='py-2 px-4 border-b text-center'>{$no}</td>";
                                    echo "<td class='py-2 px-4 border-b'>{$row['name']}</td>";
                                    echo "<td class='py-2 px-4 border-b'>{$row['email']}</td>";
                                    echo "<td class='py-2 px-4 border-b'>{$row['status']}</td>";
                                    echo "<td class='py-2 px-4 border-b'>{$row['universitas']}</td>";
                                    echo "<td class='py-2 px-4 border-b'>";
                                    echo "<div class='flex justify-center'>";
                                    echo "<a href='MainMenu.php?id={$row['id']}'>";
                                    echo "<button class='bg-blue-500 text-white py-1 px-3 rounded'>View</button>";
                                    echo "</a>";

                                    // Tombol Akses Ujian
                                    if ($row['akses_ujian'] == 1) {
                                        echo "<a href='ubah_akses_ujian.php?id={$row['id']}&status=0'>";
                                        echo "<button class='bg-red-500 text-white py-1 px-3 ml-2 rounded'>Blokir Akses</button>";
                                        echo "</a>";
                                    } else {
                                        echo "<a href='ubah_akses_ujian.php?id={$row['id']}&status=1'>";
                                        echo "<button class='bg-green-500 text-white py-1 px-3 ml-2 rounded'>Izinkan Akses</button>";
                                        echo "</a>";
                                    }

                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $no++;
                                }
                            } else {
                                echo "<tr><td colspan='6' class='py-2 px-4 border-b text-center'>Tidak ada peserta.</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <footer class="mt-auto bg-[#FE4343] text-white text-center py-2">
        <div class="container">
            Dinas Kependudukan dan Pencatatan Sipil Kota Semarang
        </div>
    </footer>
</body>

</html>
