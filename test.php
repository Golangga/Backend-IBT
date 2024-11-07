<?php
session_start();
include 'db.php';
include 'bank_soal.php';

// Periksa status session
if (session_status() == PHP_SESSION_NONE) {
    die("Session tidak dimulai dengan benar.");
}

// Inisialisasi pertanyaan jika belum ada di session
if (!isset($_SESSION['questions'])) {
    $totalQuestionsToDisplay = 100; // Jumlah soal yang ingin ditampilkan
    
    // Pastikan jumlah soal yang diminta tidak lebih dari jumlah soal yang ada
    $totalQuestionsInBank = count($bankSoal);
    $totalQuestionsToDisplay = min($totalQuestionsToDisplay, $totalQuestionsInBank);
    
    $randomKeys = array_rand($bankSoal, $totalQuestionsToDisplay);

    // Pastikan $randomKeys selalu dalam bentuk array
    if ($totalQuestionsToDisplay == 1) {
        $randomKeys = [$randomKeys];
    }

    $_SESSION['questions'] = [];
    foreach ($randomKeys as $key) {
        $_SESSION['questions'][] = $bankSoal[$key];
    }

    // Inisialisasi jawaban pengguna
    $_SESSION['answers'] = [];
    $_SESSION['correct'] = [];
}

// Ambil data pertanyaan
$questions = $_SESSION['questions'];
$totalQuestions = count($questions);

// Tangani navigasi soal
if (isset($_GET['q'])) {
    $currentQuestion = (int)$_GET['q'];
} else {
    $currentQuestion = 1;
}

if (isset($_POST['next'])) {
    if ($currentQuestion < $totalQuestions) {
        $currentQuestion++;
    }
    header("Location: Soal.php?q=" . $currentQuestion);
    exit();
} elseif (isset($_POST['prev'])) {
    if ($currentQuestion > 1) {
        $currentQuestion--;
    }
    header("Location: Soal.php?q=" . $currentQuestion);
    exit();
}

// Simpan jawaban pengguna
if (isset($_POST['option'])) {
    $_SESSION['answers'][$currentQuestion] = $_POST['option'];
    if (isset($questions[$currentQuestion - 1]['answer'])) {
        $correctAnswer = $questions[$currentQuestion - 1]['answer'];
        $_SESSION['correct'][$currentQuestion] = ($_POST['option'] == $correctAnswer);
    } else {
        $_SESSION['correct'][$currentQuestion] = false;
    }
}

$_SESSION['currentQuestion'] = $currentQuestion;

// Atur waktu
if (!isset($_SESSION['time_start'])) {
    $_SESSION['time_start'] = time();
}

$totalTime = 60 * 60; // 60 menit dalam detik
$elapsedTime = time() - $_SESSION['time_start'];
$remainingTime = $totalTime - $elapsedTime;

if ($remainingTime <= 0) {
    $remainingTime = 0;
    header("Location: selesaikan.php");
    exit;
}

$currentQuestionData = $questions[$currentQuestion - 1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Ujian Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="img/Logo.png" alt="Logo">
            <div class="text-left">
                <span>Dinas Kependudukan dan Pencatatan Sipil<br>Kota Semarang</span>
            </div>
            <div class="text-right">
                <?php 
                $nik = isset($_SESSION['nik']) ? $_SESSION['nik'] : ''; 
                $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Nama tidak ditemukan';
                ?>
                <div class="user-profile">
                    <img src="display_image.php?nik=<?php echo $nik; ?>" alt="User Photo" class="user-photo">
                    <div class="user-info">
                        <span class="user-nik"><?php echo $nik; ?></span><br>
                        <span class="user-name"><?php echo $name; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="question-container">
                <span class="question-number"><?php echo $currentQuestion; ?></span>
                <div class="timer">Sisa Waktu: <strong id="timer">60:00</strong></div>
                <div class="soal">
                    <p><?php echo $currentQuestionData['question']; ?></p>
                </div>
                <div class="options">
                    <form method="POST" id="optionsForm">
                        <?php foreach ($currentQuestionData['choices'] as $index => $option): ?>
                            <label>
                                <input type="radio" name="option" value="<?php echo $index + 1; ?>" <?php echo isset($_SESSION['answers'][$currentQuestion]) && $_SESSION['answers'][$currentQuestion] == $index + 1 ? 'checked' : ''; ?> onchange="document.getElementById('optionsForm').submit();">
                                <?php echo $option; ?>
                            </label><br>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
            <div class="sidebar">
                <strong>Nomor Soal</strong>
                <div class="question-grid">
                    <?php for ($i = 1; $i <= $totalQuestions; $i++): ?>
                        <button class="<?php 
                        $classes = '';
                        if ($i == $currentQuestion) {
                            $classes .= 'active';
                        }
                        if (isset($_SESSION['answers'][$i])) {
                            $classes .= ' answered';
                        }
                        echo $classes;
                    ?>" 
                    onclick="location.href='?q=<?php echo $i; ?>'"><?php echo $i; ?></button>
                    <?php endfor; ?>
                </div>
                <form method="POST" action="selesaikan.php" style="width: 100%; text-align: center; margin-top: 20px;">
                    <button type="submit" style="background-color: #E74C3C; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Selesaikan</button>
                </form>
            </div>
        </div>
        <div class="navigation-buttons" style="margin-top: 5px; display: flex; justify-content: space-between;">
            <form method="POST" style="width: 100%; display: flex; justify-content: space-between;">
                <button type="submit" name="prev" <?php echo $currentQuestion == 1 ? 'disabled' : ''; ?>>Soal Sebelumnya</button>
                <button type="submit" name="next" <?php echo $currentQuestion == $totalQuestions ? 'disabled' : ''; ?>>Soal Selanjutnya</button>
            </form>
        </div>
        <div class="footer red-line">
            <span>Dinas Kependudukan dan Pencatatan Sipil Kota Semarang</span>
        </div>
    </div>
    <script>
        function startTimer(duration, display) {
            let timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    window.location.href = "selesaikan.php";
                }
            }, 1000);
        }

        window.onload = function () {
            const remainingTime = <?php echo $remainingTime; ?>;
            const display = document.querySelector('#timer');
            startTimer(remainingTime, display);
        };
    </script>
</body>
</html>
