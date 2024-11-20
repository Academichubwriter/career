<?php
session_start();

// Set session timeout period (in seconds)
$session_timeout = 600; // 10 minutes

// Check if session variable for last activity time is set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $session_timeout) {
    // Session expired, destroy session and redirect to login page
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to last visited page
    header("Location: " . (isset($_SESSION['last_visited_page']) ? $_SESSION['last_visited_page'] : 'home.php'));
    exit;
}

// Login process
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    // Validate user credentials and set $_SESSION['user_id'] if login is successful
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'your_username' && $password == 'your_password') {
        // Set last visited page
        $_SESSION['last_visited_page'] = isset($_SESSION['last_visited_page']) ? $_SESSION['last_visited_page'] : 'home.php';
        header("Location: " . $_SESSION['last_visited_page']);
        exit;
    } else {
        $error = "Invalid credentials";
    }
}

// Logout process
if (isset($_GET['logout'])) {
    // Unset last visited page
    unset($_SESSION['last_visited_page']);
    // Perform other logout actions if needed
    // Redirect to login page
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
</head>
<body>
<h2>Login</h2>
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
</body>
</html>
