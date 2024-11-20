<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logins";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process job seeker signup form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['job_seeker_full_name']) && isset($_POST['job_seeker_email']) && isset($_POST['job_seeker_password'])) {
    $job_seeker_full_name = $_POST['job_seeker_full_name'];
    $job_seeker_email = $_POST['job_seeker_email'];
    $job_seeker_password = password_hash($_POST['job_seeker_password'], PASSWORD_DEFAULT); // Hash password for security

    // Insert job seeker data into database
    $sql = "INSERT INTO job_seekers (full_name, email, password) VALUES ('$job_seeker_full_name', '$job_seeker_email', '$job_seeker_password')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to home.html
        header("Location: home.html");
        exit(); // Make sure to exit after the redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
