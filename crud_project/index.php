<?php
// Memulai session
session_start();

// Proteksi: Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'crud_db');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data berita dari database
$result = $conn->query("SELECT * FROM berita ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Berita</title>
    <link rel="stylesheet" href="css/tailwind.css">
</head>
<body>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Dashboard Berita</h1>
            <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>
        </div>

        <div class="mb-4">
            <a href="create.php" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Berita</a>
        </div>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Judul</th>
                    <th class="border border-gray-300 px-4 py-2">Konten</th>
                    <th class="border border-gray-300 px-4 py-2">Tanggal Dibuat</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2"><?= $row['id'] ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['judul']) ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($row['konten']) ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?= $row['created_at'] ?></td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
