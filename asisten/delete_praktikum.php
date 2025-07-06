<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'asisten') {
    header("Location: ../auth/login.php");
    exit;
}

$id = intval($_GET['id']);
$conn->query("DELETE FROM pendaftaran_praktikum WHERE praktikum_id = $id");
$conn->query("DELETE FROM modul WHERE praktikum_id = $id");
$conn->query("DELETE FROM mata_praktikum WHERE id = $id");
header("Location: kelola_praktikum.php");
