<?php
// Database connection
$host = "localhost";
$dbname = "project";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['guests'];
$requests = $_POST['requests'];

// Use a prepared statement
$stmt = $conn->prepare("INSERT INTO reservations (name, contact, email, reservation_date, time_slot, guests, requests) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssis", $name, $contact, $email, $date, $time, $guests, $requests);

if ($stmt->execute()) {
    // Redirect to the homepage
    header("Location: homepage.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
