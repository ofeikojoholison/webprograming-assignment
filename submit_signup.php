<?php
// Database connection
$host = "localhost";
$dbname= "project";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$user = $_POST['username'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insert into database
$sql = "INSERT INTO users (username, email, password) 
        VALUES ('$username', '$email', '$password')";

$sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
if ($conn->query($sql) === TRUE) {
    // Redirect to homepage
    header("Location: homepage.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

