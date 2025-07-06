<?php include '../includes/db.php'; session_start(); include '../includes/header.php'; ?>
<h2 class="text-2xl font-bold mb-4">Praktikum Saya</h2>
<?php
$uid = $_SESSION['user_id'];
$sql = "SELECT mp.* FROM pendaftaran_praktikum pp 
        JOIN mata_praktikum mp ON pp.praktikum_id = mp.id 
        WHERE pp.user_id = $uid";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<div class='bg-white shadow p-4 rounded mb-4'>
        <h3 class='text-lg font-semibold'>{$row['nama']}</h3>
        <a href='detail_praktikum.php?id={$row['id']}' class='text-blue-600 underline'>Lihat Detail</a>
    </div>";
}
?>
<?php include '../includes/footer.php'; ?>
