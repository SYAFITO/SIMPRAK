<?php
include '../includes/db.php';
include '../includes/header.php'; ?>
<h2 class="text-2xl font-bold mb-4">Katalog Mata Praktikum</h2>
<p class="mb-6 text-gray-700">Daftar semua mata praktikum yang tersedia:</p>
<?php
$result = $conn->query("SELECT * FROM mata_praktikum ORDER BY nama ASC");
if ($result->num_rows === 0) {
    echo "<p class='text-gray-500'>Belum ada praktikum tersedia.</p>";
} else {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='bg-white shadow p-4 rounded mb-4'>
            <h3 class='text-lg font-semibold text-blue-800'>{$row['nama']}</h3>
            <p class='text-gray-700'>{$row['deskripsi']}</p>
        </div>";
    }
}
include '../includes/footer.php'; ?>
