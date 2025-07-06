<?php
include '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'asisten') {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'];
if ($id != $_SESSION['user_id']) {
    $conn->query("DELETE FROM users WHERE id = $id");
}
header("Location: kelola_akun.php");
