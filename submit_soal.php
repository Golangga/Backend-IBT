<?php
// Koneksi ke database
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $soal = $_POST['soal'];
    $jawaban_a = $_POST['jawaban_a'];
    $jawaban_b = $_POST['jawaban_b'];
    $jawaban_c = $_POST['jawaban_c'];
    $jawaban_d = $_POST['jawaban_d'];
    $jawaban_e = $_POST['jawaban_e'];
    $jawaban_benar = $_POST['jawaban_benar'];

    // Query untuk menyimpan soal dan jawaban ke database
    $sql = "INSERT INTO questions (soal, jawaban_a, jawaban_b, jawaban_c, jawaban_d, jawaban_e, answer) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Mempersiapkan statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $soal, $jawaban_a, $jawaban_b, $jawaban_c, $jawaban_d, $jawaban_e, $jawaban_benar);

    // Eksekusi query
    if ($stmt->execute()) {
        // Redirect ke input_soal.php setelah berhasil
        header("Location: input_soal.php?status=success");
        exit(); // Pastikan script berhenti setelah redirect
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
