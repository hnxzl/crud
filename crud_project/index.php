<?php
$conn = new mysqli('localhost', 'root', '', 'crud_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM news");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Berita</title>
    <link rel="stylesheet" href="css/tailwind.css">
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-xl font-bold mb-4">Daftar Berita</h1>
        <a href="create.php" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Berita</a>
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['content'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="text-blue-500">Edit</a> |
                        <a href="delete.php?id=<?= $row['id'] ?>" class="text-red-500">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
