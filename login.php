<?php
session_start();  // Start session for storing user ID

// Database connection and error handling (replace with your details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logins"; // Change to your database name

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}

// Get login credentials
$username = $_POST['username'];
$password = $_POST['password'];

// Prepared statement for security (replace with your logic)
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $connection->prepare($query);
$stmt->execute([$username]);  // Bind username parameter

$user = $stmt->fetch_assoc();  // Get user data if found

if ($user && password_verify($password, $user['password_hash'])) {
  // Login successful
  $_SESSION['user_id'] = $user['id'];  // Store user ID in session (replace with your identifier)
  header('Location: home.html');  // Redirect to home page
  exit();
} else {
  // Login failed (invalid username or password)
  $message = "Invalid login credentials.";
}

mysqli_close($connection);
?>

