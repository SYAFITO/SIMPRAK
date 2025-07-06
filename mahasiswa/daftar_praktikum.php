<?php
include '../includes/db.php';
session_start();
include '../includes/header.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mahasiswa') {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
?>
<h2 class="text-2xl font-bold mb-4">Daftar Mata Praktikum</h2>
<?php
$result = $conn->query("SELECT * FROM mata_praktikum");
while ($row = $result->fetch_assoc()) {
    $praktikum_id = $row['id'];
    $cek = $conn->query("SELECT * FROM pendaftaran_praktikum WHERE user_id = $user_id AND praktikum_id = $praktikum_id");
    $sudah_daftar = ($cek->num_rows > 0);

    echo "<div class='bg-white p-4 shadow rounded mb-4'>
        <h3 class='text-lg font-semibold'>{$row['nama']}</h3>
        <p class='mb-2'>{$row['deskripsi']}</p>";

    if ($sudah_daftar) {
        echo "<span class='text-green-600 font-semibold'>Sudah terdaftar</span>";
    } else {
        echo "<form method='post'>
            <input type='hidden' name='praktikum_id' value='{$row['id']}'>
            <button name='daftar' class='bg-blue-500 text-white px-4 py-1 rounded'>Daftar</button>
        </form>";
    }
    echo "</div>";
}

if (isset($_POST['daftar'])) {
    $praktikum_id = intval($_POST['praktikum_id']);
    $cek = $conn->query("SELECT * FROM pendaftaran_praktikum WHERE user_id = $user_id AND praktikum_id = $praktikum_id");
    if ($cek->num_rows == 0) {
        $conn->query("INSERT INTO pendaftaran_praktikum (user_id, praktikum_id) VALUES ($user_id, $praktikum_id)");
        echo "<script>alert('Berhasil mendaftar.'); location.href='daftar_praktikum.php';</script>";
    }
}
include '../includes/footer.php'; ?>
