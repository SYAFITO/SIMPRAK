<?php include '../includes/header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Kelola Mata Praktikum</h2>

<form method="post" class="mb-4">
    <input type="text" name="nama" placeholder="Nama Praktikum" required class="p-2 border rounded w-full mb-2">
    <textarea name="deskripsi" placeholder="Deskripsi" required class="p-2 border rounded w-full mb-2"></textarea>
    <button name="tambah" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
</form>

<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $desc = $_POST['deskripsi'];
    $conn->query("INSERT INTO mata_praktikum (nama, deskripsi) VALUES ('$nama', '$desc')");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM mata_praktikum WHERE id = $id");
}

$data = $conn->query("SELECT * FROM mata_praktikum");
while ($d = $data->fetch_assoc()) {
    echo "<div class='bg-white p-4 shadow rounded mb-2'>
        <strong>{$d['nama']}</strong>
        <p>{$d['deskripsi']}</p>
        <a href='delete_praktikum.php?id={$d['id']}' class='text-red-600'>Hapus</a>
    </div>";
}
?>

<?php include '../includes/footer.php'; ?>
