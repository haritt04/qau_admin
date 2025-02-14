<?php
session_start();  // Start session for authentication

include 'config.php';  // Load environment settings

// Debugging: Check if the .env variables are loaded
echo "<pre>";
echo "APP_NAME: " . getenv('APP_NAME') . "<br>";
echo "APP_ENV: " . getenv('APP_ENV') . "<br>";
echo "ADMIN_USERNAME: " . getenv('ADMIN_USERNAME') . "<br>";
echo "ADMIN_PASSWORD: " . getenv('ADMIN_PASSWORD') . "<br>";
echo "</pre>";

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === getenv('ADMIN_USERNAME') && $password === getenv('ADMIN_PASSWORD')) {
        $_SESSION['logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Admin Panel</title>
</head>
<body>
    <h2>Admin Login</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
</body>
</html>
