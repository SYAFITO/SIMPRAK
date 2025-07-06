<?php include '../includes/header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Kelola Akun Pengguna</h2>
<a href="tambah_user.php" class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Akun</a>

<?php
$data = $conn->query("SELECT * FROM users ORDER BY id DESC");
while ($d = $data->fetch_assoc()) {
    echo "<div class='bg-white p-4 rounded shadow mb-2'>
        <strong>{$d['username']}</strong> ({$d['role']})
        <a href='hapus_user.php?id={$d['id']}' class='text-red-600 ml-4' onclick=\"return confirm('Hapus user ini?')\">Hapus</a>
    </div>";
}
?>

<?php include '../includes/footer.php'; ?>
