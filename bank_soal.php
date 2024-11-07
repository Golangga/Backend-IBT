<?php
include 'db.php';

$bankSoal = [];

$sql = "SELECT * FROM questions LIMIT 100";
$result = $conn->query($sql);

$letterToNumberMap = [
    'A' => 1,
    'B' => 2,
    'C' => 3,
    'D' => 4,
    'E' => 5,
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bankSoal[] = [
            'id' => $row['id'],
            'question' => $row['soal'],
            'choices' => [
                $row['jawaban_a'],
                $row['jawaban_b'],
                $row['jawaban_c'],
                $row['jawaban_d'],
                $row['jawaban_e'],
            ],
            // Konversi jawaban dari huruf ke angka menggunakan mapping
            'answer' => $letterToNumberMap[$row['answer']],
        ];
    }
} else {
    echo "Tidak ada soal yang ditemukan.";
}

$conn->close();

?>
