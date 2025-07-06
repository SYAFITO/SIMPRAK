<?php include '../includes/header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Laporan Masuk</h2>

<?php
$laporan = $conn->query("SELECT l.*, u.username, m.nama_modul FROM laporan l 
    JOIN users u ON l.user_id = u.id 
    JOIN modul m ON l.modul_id = m.id
    ORDER BY l.id DESC");

while ($d = $laporan->fetch_assoc()) {
    echo "<div class='bg-white p-4 rounded shadow mb-2'>
        <strong>{$d['username']}</strong> mengumpulkan <em>{$d['nama_modul']}</em><br>
        <a class='text-blue-600' href='../uploads/{$d['file_laporan']}' target='_blank'>Download</a><br>
        <a href='beri_nilai.php?id={$d['id']}' class='text-green-600'>Beri Nilai</a>
    </div>";
}
?>

<?php include '../includes/footer.php'; ?>
