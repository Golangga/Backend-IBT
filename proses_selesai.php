<?php
session_start();
include 'db.php'; // Koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['nik'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.');</script>";
    echo "<script>window.location.href = 'finish.php';</script>";
    exit();
}

// Cek apakah session soal dan jawaban ada
if (!isset($_SESSION['questions']) || !isset($_SESSION['answers'])) {
    echo "<p>Tidak ada data soal atau jawaban.</p>";
    echo "<script>
        setTimeout(function(){
            window.location.href = 'finish.php';
        }, 5000);
    </script>";
    exit();
}

// Inisialisasi variabel
$correctAnswers = 0;
$wrongAnswers = 0;

// Iterasi setiap jawaban untuk menghitung skor
foreach ($_SESSION['questions'] as $index => $question) {
    $questionNumber = $index + 1;
    if (isset($_SESSION['answers'][$questionNumber])) {
        $userAnswer = $_SESSION['answers'][$questionNumber];
        $correctAnswer = $question['answer'];

        if ($userAnswer == $correctAnswer) {
            $correctAnswers++;
        } else {
            $wrongAnswers++;
        }
    } else {
        $wrongAnswers++; // Jika tidak ada jawaban, anggap salah
    }
}

// Simpan hasil ke dalam database
$nik = $_SESSION['nik'];
$sql = "INSERT INTO scores (nik, correct_answers, wrong_answers, score_date) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $nik, $correctAnswers, $wrongAnswers);

if ($stmt->execute()) {
    // Perbarui akses ujian menjadi ditolak (0)
    $updateAccessSql = "UPDATE users SET akses_ujian = 0 WHERE nik = ?";
    $updateStmt = $conn->prepare($updateAccessSql);
    $updateStmt->bind_param("s", $nik);
    $updateStmt->execute();

    // Reset timer
    $_SESSION['time_start'] = time();

    // Redirect ke halaman utama atau halaman yang relevan
    header("Location: finish.php"); // Ganti dengan halaman yang sesuai
} else {
    echo "Gagal menyimpan skor: " . $conn->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();
$updateStmt->close();

// Hapus session jika diperlukan, kecuali time_start
unset($_SESSION['questions']);
unset($_SESSION['answers']);
// Session time_start tidak dihapus agar timer tetap berjalan
?>
