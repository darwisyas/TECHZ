<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'thrivewithin';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$category = $_POST['category'] ?? '';

// Insert data into the bookings table
$sql = "INSERT INTO bookings (name, email, phone, category)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $category);

if ($stmt->execute()) {
    echo "Your booking has been successfully submitted. We will contact you as soon as possible.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>