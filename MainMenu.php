<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE PEGAWAI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-[#FE4343] h-[100px] shadow-lg flex items-center justify-center">
        <div class="container mx-auto flex items-center justify-between">
            <a href="index.php">
                <img src="img/Logo.png" alt="Logo" class="h-[69px]">
            </a>
            <div class="text-white flex space-x-4">
            </div>
        </div>
    </nav>

    <!-- Sidebar and Content -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-1/4 bg-[#FF8B8B] h-screen p-6">
            <ul class="text-black">
                <li class="mb-4">
                    <a href="participants.php" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Daftar Peserta</a>
                </li>
                <li class="mb-4">
                    <a href="scores.php" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Daftar Nilai</a>
                </li>
                <li class="mb-4">
                    <a href="input_soal.php" class="block py-2 px-4 hover:bg-red-500 rounded-lg">Input Soal</a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="w-3/4 p-6">
            <div class="flex justify-center items-center h-screen">
                <div class="bg-gray-200 p-6 rounded-lg shadow-md w-full max-w-4xl flex items-center">
                    <!-- Info Profil -->
                    <div class="w-3/4">
                        <h1 class="text-2xl font-bold text-center mb-6">PROFILE PEGAWAI</h1>
                        <p class="text-lg mb-2"><strong>NIK     :</strong> 122738437462468</p>
                        <p class="text-lg mb-2"><strong>NIP     :</strong> 1938294328</p>
                        <p class="text-lg mb-2"><strong>Nama    :</strong> Vita</p>
                        <p class="text-lg mb-2"><strong>Email   :</strong> vita@gmail.com</p>
                        <p class="text-lg mb-2"><strong>No HP   :</strong> 087362738275</p>
                        <div class="text-center mt-6">
                        </div>
                    </div>
                    
                    <!-- Foto Profil -->
                    <div class="w-1/4 flex justify-end">
                        <img src="https://i.pinimg.com/originals/f1/09/65/f10965bc273164d726fd24e3c78855d7.jpg" alt="Foto Profil" class="h-48 w-48 object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
