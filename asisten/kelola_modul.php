<?php include '../includes/header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Kelola Modul</h2>

<form method="post" enctype="multipart/form-data" class="mb-4">
    <select name="praktikum_id" class="p-2 border rounded w-full mb-2">
        <option value="">-- Pilih Praktikum --</option>
        <?php
        $praktikum = $conn->query("SELECT * FROM mata_praktikum");
        while ($p = $praktikum->fetch_assoc()) {
            echo "<option value='{$p['id']}'>{$p['nama']}</option>";
        }
        ?>
    </select>
    <input type="text" name="nama_modul" placeholder="Nama Modul" required class="p-2 border rounded w-full mb-2">
    <input type="file" name="file_materi" required class="mb-2">
    <button name="upload" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Modul</button>
</form>

<?php
if (isset($_POST['upload'])) {
    $praktikum_id = $_POST['praktikum_id'];
    $nama_modul = $_POST['nama_modul'];
    $file = $_FILES['file_materi']['name'];
    $tmp = $_FILES['file_materi']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/$file");
    $conn->query("INSERT INTO modul (praktikum_id, nama_modul, file_materi) VALUES ($praktikum_id, '$nama_modul', '$file')");
}

$modul = $conn->query("SELECT m.*, p.nama AS praktikum FROM modul m JOIN mata_praktikum p ON m.praktikum_id = p.id");
while ($m = $modul->fetch_assoc()) {
    echo "<div class='bg-white p-4 rounded shadow mb-2'>
        <strong>{$m['nama_modul']}</strong> ({$m['praktikum']})<br>
        File: <a href='../uploads/{$m['file_materi']}' class='text-blue-600 underline'>{$m['file_materi']}</a> |
        <a href='delete_modul.php?id={$m['id']}' class='text-red-600'>Hapus</a>
    </div>";
}
?>

<?php include '../includes/footer.php'; ?>
