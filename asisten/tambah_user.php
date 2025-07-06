<?php include '../includes/header.php'; ?>

<h2 class="text-2xl font-bold mb-4">Tambah Akun Pengguna</h2>

<form method="post" class="bg-white p-6 rounded shadow max-w-md">
    <input type="text" name="username" placeholder="Username" required class="w-full p-2 border rounded mb-2">
    <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded mb-2">
    <select name="role" class="w-full p-2 border rounded mb-4">
        <option value="mahasiswa">Mahasiswa</option>
        <option value="asisten">Asisten</option>
    </select>
    <button type="submit" name="simpan" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $r = $_POST['role'];
    $cek = $conn->query("SELECT * FROM users WHERE username = '$u'");
    if ($cek->num_rows > 0) {
        echo "<p class='text-red-600'>Username sudah ada.</p>";
    } else {
        $conn->query("INSERT INTO users (username, password, role) VALUES ('$u', '$p', '$r')");
        echo "<p class='text-green-600'>Akun berhasil ditambahkan.</p>";
    }
}
?>

<?php include '../includes/footer.php'; ?>
