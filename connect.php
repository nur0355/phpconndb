<?php

// Get form data from POST
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password']; // Changed variable name to avoid conflict

// DB connection details
$servername = "localhost";
$username = "root";
$password = ""; // Keep this empty if no password is set for root
$dbname = "submit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // FIXED: Correct parameters

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs to prevent SQL injection
$firstName = $conn->real_escape_string($firstName);
$lastName = $conn->real_escape_string($lastName);
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Insert query
$sql = "INSERT INTO submit (firstName, lastName, email, password) 
        VALUES ('$firstName', '$lastName', '$email', '$password')"; // FIXED: Added comma, fixed quotes

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
