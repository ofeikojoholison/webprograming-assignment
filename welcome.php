<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Babylon Cafe</title>
    <link rel="stylesheet" href="welcome-style.css">
</head>
<body>
    <header class="welcome-header">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>We're thrilled to have you at Babylon Cafe.</p>
    </header>

    <section class="welcome-content">
        <p>Explore our menu, book a table, or learn more about what makes us special.</p>
        <div class="actions">
            <a href="bookatable.html" class="button">Book a Table</a>
            <a href="menu.html" class="button">Explore Menu</a>
        </div>
    </section>
</body>
</html>
