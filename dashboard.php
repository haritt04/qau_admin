<?php
// dashboard.php (Admin Panel)

session_start();
include 'config.php';  // Load environment settings

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

?>
<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome to the Admin Dashboard</h2>
    <p>You are logged in!</p>

    <nav>
        <a href="?logout=true">Logout</a>
    </nav>
</body>
</html>


<!-- Page content here -->
<?php include 'includes/footer.php'; ?>

