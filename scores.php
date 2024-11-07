<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai</title>
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
        <aside class="w-1/6 bg-[#FF8B8B] min-h-screen p-6">
            <ul class="text-white">
                <li class="mb-4">
                    <a href="admin_dashboard.php" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Daftar Peserta</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Daftar Nilai</a>
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
            <h1 class="text-2xl font-bold mb-6">Daftar Nilai</h1>
            
            <!-- Tabel Daftar Nilai -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-4">Daftar Nilai</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">No</th>
                                <th class="py-2 px-4 border-b">Nama Peserta</th>
                                <th class="py-2 px-4 border-b">Jawaban Benar</th>
                                <th class="py-2 px-4 border-b">Jawaban Salah</th>
                                <th class="py-2 px-4 border-b">Nilai</th>
                            </tr>
                        </thead>
                        <tbody style="">
                            <?php
include 'db.php';

$sql = "SELECT users.name, scores.correct_answers, scores.wrong_answers 
        FROM scores 
        JOIN users ON scores.nik = users.nik";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    $no = 1;
    while($row = $result->fetch_assoc()) {
         echo "<tr>";
                                    echo "<td class='py-2 px-4 border-b text-center'>{$no}</td>";
                                    echo "<td class='py-2 px-4 border-b text-center'>{$row['name']}</td>";
                                    echo "<td class='py-2 px-4 border-b text-center'>{$row['correct_answers']}</td>";
                                    echo "<td class='py-2 px-4 border-b text-center'>{$row['wrong_answers']}</td>";
                                    echo "<td class='py-2 px-4 border-b text-center'>{$row['correct_answers']}</td>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $no++;
    }
} else {
    echo "<tr><td colspan='5' class='py-2 px-4 border-b text-center'>Tidak ada nilai.</td></tr>";
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