<?php
$conn = new mysqli('localhost', 'root', '', 'crud_db');

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM news WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>
