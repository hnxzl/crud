<?php
$conn = new mysqli('localhost', 'root', '', 'crud_db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO news (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="css/tailwind.css">
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-xl font-bold mb-4">Tambah Berita</h1>
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="title" class="block text-sm font-medium">Judul</label>
                <input type="text" id="title" name="title" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium">Konten</label>
                <textarea id="content" name="content" class="w-full border rounded px-3 py-2"></textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
            <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
        </form>
    </div>
</body>
</html>
