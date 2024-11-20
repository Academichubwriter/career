<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "logins"; // Change to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $email = $conn->real_escape_string($_POST['employer_email']);
    $password = $conn->real_escape_string($_POST['employer_password']);

    // SQL query to fetch the hashed password from the database
    $sql = "SELECT * FROM employers WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result === false) {
        // Handle query error
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password_from_db = $row['password'];

        // Verify the hashed password
        if (password_verify($password, $hashed_password_from_db)) {
            // Passwords match, set session variable or perform other actions
            session_start();
            $_SESSION['employer_email'] = $email;
            // Redirect to home.html
            header("Location: employer.html");
            exit(); // Ensure that code execution stops after the redirect
        } else {
            // Passwords do not match
            echo "Invalid email or password!";
        }
    } else {
        // User does not exist
        echo "Invalid email or password!";
    }

    // Close connection
    $conn->close();
}
?>
