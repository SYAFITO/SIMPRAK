<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIMPRAK</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-700 text-white px-6 py-4 shadow">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold">SIMPRAK - Sistem Informasi Manajemen Praktikum</h1>
            <div class="space-x-4">
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'asisten'): ?>
                    <a href="../asisten/dashboard.php" class="hover:underline">Dashboard</a>
                    <a href="../asisten/kelola_praktikum.php" class="hover:underline">Praktikum</a>
                    <a href="../asisten/kelola_modul.php" class="hover:underline">Modul</a>
                    <a href="../asisten/laporan_masuk.php" class="hover:underline">Laporan</a>
                    <a href="../asisten/kelola_akun.php" class="hover:underline">Akun</a>
                <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'mahasiswa'): ?>
                    <a href="../mahasiswa/dashboard.php" class="hover:underline">Dashboard</a>
                    <a href="../mahasiswa/praktikum_saya.php" class="hover:underline">Praktikum Saya</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="../auth/logout.php" class="text-red-300 hover:underline">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <main class="p-6">