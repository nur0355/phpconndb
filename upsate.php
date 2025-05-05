<?php
require 'connect.php'

$id        = $_POST['id'];
$firstName = $_POST['firstName'];
$lastName  = $_POST['lastName'];
$email     = $_POST['email'];

$stmt = $conn->prepare("UPDATE submit SET firstName=?, lastName=?, email=? WHERE id=?");
$stmt->bind_param("sssi", $firstName, $lastName, $email, $id);

if ($stmt->execute()) {
    echo "User updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
