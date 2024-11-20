<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logins";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process signup form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

    // Assign role based on user selection (job_seeker or employer)
    $role = ($_POST['user_type'] == 'job_seeker') ? 1 : 2; // Assuming job_seeker role_id is 1 and employer role_id is 2

    // Insert user data into database
    $sql = "INSERT INTO users (username, password, role_id) VALUES ('$username', '$password', $role)";
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
