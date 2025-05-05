<?php
require 'connect.php';

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM submit WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "User deleted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
