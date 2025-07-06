<?php include '../includes/header.php'; ?>

<h2 class="text-2xl font-bold mb-6">Dashboard Asisten 👨‍🏫</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6">

    <!-- Kartu Kelola Praktikum -->
    <a href="kelola_praktikum.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg hover:bg-blue-50 transition-all">
        <h3 class="text-xl font-semibold text-blue-800 mb-2">📘 Kelola Mata Praktikum</h3>
        <p class="text-gray-600">Tambah, ubah, atau hapus mata praktikum yang tersedia.</p>
    </a>

    <!-- Kartu Kelola Modul -->
    <a href="kelola_modul.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg hover:bg-blue-50 transition-all">
        <h3 class="text-xl font-semibold text-blue-800 mb-2">📄 Kelola Modul</h3>
        <p class="text-gray-600">Atur pertemuan dan unggah materi praktikum.</p>
    </a>

    <!-- Kartu Laporan Masuk -->
    <a href="laporan_masuk.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg hover:bg-blue-50 transition-all">
        <h3 class="text-xl font-semibold text-blue-800 mb-2">📝 Laporan Masuk</h3>
        <p class="text-gray-600">Periksa laporan yang dikumpulkan mahasiswa dan beri nilai.</p>
    </a>

    <!-- Kartu Kelola Akun -->
    <a href="kelola_akun.php" class="block bg-white p-6 rounded-xl shadow hover:shadow-lg hover:bg-blue-50 transition-all">
        <h3 class="text-xl font-semibold text-blue-800 mb-2">👤 Kelola Akun Pengguna</h3>
        <p class="text-gray-600">Tambahkan, hapus, atau kelola data akun mahasiswa & asisten.</p>
    </a>

</div>

<?php include '../includes/footer.php'; ?>
