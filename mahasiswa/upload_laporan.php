<?php
include '../includes/db.php';
session_start();
include '../includes/header.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mahasiswa') {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if (!isset($_GET['modul_id'])) {
    echo "<p class='text-red-600'>Modul tidak ditemukan.</p>";
    include '../includes/footer.php';
    exit;
}

$modul_id = intval($_GET['modul_id']);
$modul = $conn->query("SELECT m.*, p.nama AS nama_praktikum 
                       FROM modul m 
                       JOIN mata_praktikum p ON m.praktikum_id = p.id 
                       WHERE m.id = $modul_id");

if ($modul->num_rows === 0) {
    echo "<p class='text-red-600'>Data modul tidak ditemukan.</p>";
    include '../includes/footer.php';
    exit;
}

$data = $modul->fetch_assoc();
?>

<h2 class="text-2xl font-bold mb-4">Upload Laporan</h2>

<div class="bg-white shadow p-4 rounded mb-4">
    <p><strong>Praktikum:</strong> <?= htmlspecialchars($data['nama_praktikum']) ?></p>
    <p><strong>Modul:</strong> <?= htmlspecialchars($data['nama_modul']) ?></p>
    <p><strong>Materi:</strong> 
        <a href="../uploads/<?= $data['file_materi'] ?>" class="text-blue-600 underline" target="_blank">Download</a>
    </p>
</div>

<form method="post" enctype="multipart/form-data" class="bg-white p-4 rounded shadow max-w-lg">
    <div class="mb-4">
        <label class="block font-medium">Upload File Laporan</label>
        <input type="file" name="laporan" accept=".pdf,.doc,.docx" required class="p-2 border rounded w-full">
    </div>
    <button type="submit" name="upload" class="bg-green-600 text-white px-4 py-2 rounded">Kirim Laporan</button>
    <a href="praktikum_saya.php" class="ml-3 text-blue-600 underline">← Kembali</a>
</form>

<?php
if (isset($_POST['upload'])) {
    $file = $_FILES['laporan']['name'];
    $tmp  = $_FILES['laporan']['tmp_name'];
    $target = "../uploads/" . basename($file);

    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $allowed = ['pdf', 'doc', 'docx'];

    if (!in_array(strtolower($ext), $allowed)) {
        echo "<p class='text-red-600 mt-4'>Format file tidak diperbolehkan.</p>";
    } else {
        $cek = $conn->query("SELECT * FROM laporan WHERE user_id=$user_id AND modul_id=$modul_id");
        if ($cek->num_rows == 0) {
            move_uploaded_file($tmp, $target);
            $conn->query("INSERT INTO laporan (user_id, modul_id, file_laporan) 
                          VALUES ($user_id, $modul_id, '$file')");
            echo "<p class='text-green-600 mt-4'>Laporan berhasil dikirim.</p>";
        } else {
            echo "<p class='text-yellow-600 mt-4'>Anda sudah mengirim laporan sebelumnya.</p>";
        }
    }
}
include '../includes/footer.php'; ?>
