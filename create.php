<?php
require 'connect.php';

$firstName = $_POST['firstName'];
$lastName  = $_POST['lastName'];
$email     = $_POST['email'];
$password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO submit (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

if ($stmt->execute()) {
    echo "User added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
