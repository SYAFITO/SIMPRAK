<?php
include '../includes/db.php';
session_start();
include '../includes/header.php';

$praktikum_id = $_GET['id'];
$uid = $_SESSION['user_id'];
$modul = $conn->query("SELECT * FROM modul WHERE praktikum_id = $praktikum_id");

echo "<h2 class='text-2xl font-bold mb-4'>Modul Praktikum</h2>";

while ($row = $modul->fetch_assoc()) {
    echo "<div class='bg-white shadow p-4 rounded mb-4'>
        <h3 class='font-semibold'>{$row['nama_modul']}</h3>
        <p><a class='text-blue-600 underline' href='../uploads/{$row['file_materi']}' target='_blank'>Download Materi</a></p>";

    echo "<form method='post' enctype='multipart/form-data'>
        <input type='file' name='laporan' required class='my-2'>
        <input type='hidden' name='modul_id' value='{$row['id']}'>
        <button name='upload' class='bg-green-500 text-white px-3 py-1 rounded'>Upload Laporan</button>
    </form>";

    $mid = $row['id'];
    $cek = $conn->query("SELECT * FROM laporan WHERE user_id=$uid AND modul_id=$mid");
    if ($cek->num_rows > 0) {
        $lap = $cek->fetch_assoc();
        echo "<p class='text-sm mt-2 text-gray-700'>Nilai: <strong>{$lap['nilai']}</strong> | Feedback: {$lap['feedback']}</p>";
    }

    echo "</div>";
}

if (isset($_POST['upload'])) {
    $modul_id = $_POST['modul_id'];
    $file = $_FILES['laporan']['name'];
    $tmp = $_FILES['laporan']['tmp_name'];
    $target = "../uploads/$file";

    move_uploaded_file($tmp, $target);

    $cek = $conn->query("SELECT * FROM laporan WHERE user_id=$uid AND modul_id=$modul_id");
    if ($cek->num_rows == 0) {
        $conn->query("INSERT INTO laporan (user_id, modul_id, file_laporan) VALUES ($uid, $modul_id, '$file')");
        echo "<p class='text-green-600'>Laporan diunggah!</p>";
    } else {
        echo "<p class='text-yellow-600'>Sudah mengirim laporan.</p>";
    }
}
include '../includes/footer.php'; ?>
