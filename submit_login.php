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
$user = $_POST['username'];
$pass = $_POST['password'];

// Check if user exists
$sql = "SELECT * FROM users WHERE username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        // Redirect to homepage
        header("Location: homepage.html");
        exit();
    } else {
        echo "Invalid password. Please try again.";
    }
} else {
    echo "No user found with that username.";
}

$conn->close();
?>
