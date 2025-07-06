<?php include '../includes/header.php';

$id = $_GET['id'];
$data = $conn->query("SELECT l.*, u.username, m.nama_modul 
                      FROM laporan l
                      JOIN users u ON l.user_id = u.id
                      JOIN modul m ON l.modul_id = m.id
                      WHERE l.id = $id")->fetch_assoc();
?>

<h2 class="text-2xl font-bold mb-4">Beri Nilai Laporan</h2>

<div class="bg-white p-4 rounded shadow mb-6 max-w-lg">
    <p><strong>Mahasiswa:</strong> <?= $data['username'] ?></p>
    <p><strong>Modul:</strong> <?= $data['nama_modul'] ?></p>
    <p><a href='../uploads/<?= $data['file_laporan'] ?>' class='text-blue-600 underline'>Download Laporan</a></p>
</div>

<form method="post">
    <input type="number" name="nilai" placeholder="Nilai" class="p-2 border rounded mb-2" value="<?= $data['nilai'] ?>"><br>
    <textarea name="feedback" placeholder="Feedback" class="p-2 border rounded w-full"><?= $data['feedback'] ?></textarea><br>
    <button name="simpan" class="bg-green-600 text-white px-4 py-2 rounded mt-2">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nilai = $_POST['nilai'];
    $feedback = $_POST['feedback'];
    $conn->query("UPDATE laporan SET nilai=$nilai, feedback='$feedback' WHERE id=$id");
    echo "<script>alert('Nilai berhasil disimpan'); location.href='laporan_masuk.php';</script>";
}
?>

<?php include '../includes/footer.php'; ?>
