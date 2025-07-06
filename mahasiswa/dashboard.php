<?php include '../includes/header.php'; ?>

<h2 class="text-2xl font-bold mb-6">Selamat Datang, Mahasiswa 👋</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

    <!-- Kartu Daftar Praktikum -->
    <a href="daftar_praktikum.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all hover:bg-blue-50">
        <h3 class="text-xl font-semibold text-blue-800 mb-2">📋 Daftar Praktikum</h3>
        <p class="text-gray-600">Lihat dan daftar mata praktikum yang tersedia.</p>
    </a>

    <!-- Kartu Praktikum Saya -->
    <a href="praktikum_saya.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all hover:bg-blue-50">
        <h3 class="text-xl font-semibold text-blue-800 mb-2">📁 Praktikum Saya</h3>
        <p class="text-gray-600">Lihat praktikum yang telah kamu ikuti dan akses modul serta laporan.</p>
    </a>

</div>

<?php include '../includes/footer.php'; ?>
