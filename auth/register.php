<?php
include '../includes/db.php';
session_start();
include '../includes/header.php';
?>

<h2 class="text-xl font-bold mb-4">Registrasi</h2>

<form method="post" class="bg-white p-4 shadow rounded w-full max-w-sm">
    <input type="text" name="username" placeholder="Username" required class="mb-2 p-2 w-full border rounded">
    <input type="password" name="password" placeholder="Password" required class="mb-2 p-2 w-full border rounded">
    <select name="role" class="mb-2 p-2 w-full border rounded">
        <option value="mahasiswa">Mahasiswa</option>
        <option value="asisten">Asisten</option>
    </select>
    <button name="register" class="bg-green-500 text-white px-4 py-2 rounded w-full">Daftar</button>
</form>

<?php
if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $cek = $conn->query("SELECT * FROM users WHERE username = '$user'");
    if ($cek->num_rows > 0) {
        echo "<p class='text-red-600 mt-4'>Username sudah digunakan.</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $pass, $role);
        $stmt->execute();
        echo "<p class='text-green-600 mt-4'>Akun berhasil dibuat. Silakan login.</p>";
    }
}
?>

<?php include '../includes/footer.php'; ?>
