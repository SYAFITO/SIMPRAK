<?php
include '../includes/db.php';
session_start();
include '../includes/header.php';

if (isset($_SESSION['user_id'])) {
    // Redirect sesuai role
    header("Location: ../" . $_SESSION['role'] . "/dashboard.php");
    exit;
}
?>

<h2 class="text-xl font-bold mb-4">Login</h2>

<form method="post" class="bg-white p-4 shadow rounded w-full max-w-sm">
    <input type="text" name="username" placeholder="Username" required class="mb-2 p-2 w-full border rounded">
    <input type="password" name="password" placeholder="Password" required class="mb-2 p-2 w-full border rounded">
    <button name="login" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Login</button>
</form>

<!-- Tambahan link daftar -->
<p class="mt-4 text-center">
    Belum punya akun? <a href="register.php" class="text-blue-600 underline">Daftar sekarang</a>
</p>

<?php
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data && password_verify($pass, $data['password'])) {
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['role'] = $data['role'];
        header("Location: ../{$data['role']}/dashboard.php");
    } else {
        echo "<p class='text-red-600 mt-4 text-center'>Username atau password salah.</p>";
    }
}
?>

<?php include '../includes/footer.php'; ?>
