<?php
// Start session
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    if (isset($_POST['job_seeker_email']) && isset($_POST['job_seeker_password'])) {
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
        $email = $conn->real_escape_string($_POST['job_seeker_email']);
        $password = $conn->real_escape_string($_POST['job_seeker_password']);

        // Retrieve the hashed password from the database
        $sql = "SELECT password FROM job_seekers WHERE email='$email'";
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
                $_SESSION['job_seeker_email'] = $email;
                // Redirect to index.html
                header("Location: home.html");
                exit(); // Make sure to exit after the redirection
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
    } else {
        // Handle missing form inputs
        echo "Email and password are required!";
    }
}
?>
