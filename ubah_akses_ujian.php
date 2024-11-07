<?php
include 'db.php';

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE users SET akses_ujian = $status WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: admin_dashboard.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
