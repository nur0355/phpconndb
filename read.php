<?php
require 'connect.php';

$sql = "SELECT id, firstName, lastName, email FROM submit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']} - Name: {$row['firstName']} {$row['lastName']} - Email: {$row['email']}<br>";
    }
} else {
    echo "No records found.";
}

$conn->close();
?>
