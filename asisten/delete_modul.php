<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'asisten') {
    header("Location: ../auth/login.php");
    exit;
}

$modul_id = intval($_GET['id']);
$data = $conn->query("SELECT * FROM modul WHERE id = $modul_id")->fetch_assoc();

if ($data) {
    $file_path = "../uploads/" . $data['file_materi'];
    if (file_exists($file_path)) {
        unlink($file_path);
    }
    $conn->query("DELETE FROM modul WHERE id = $modul_id");
}
header("Location: kelola_modul.php");
