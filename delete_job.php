<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logins";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the job_id is set and valid
if (isset($_POST["job_id"]) && is_numeric($_POST["job_id"])) {
    $job_id = $_POST["job_id"];
    
    // Prepare and execute the SQL statement to delete the job
    $stmt = $conn->prepare("DELETE FROM jobs WHERE id = ?");
    $stmt->bind_param("i", $job_id);
    
    if ($stmt->execute()) {
        echo "Job deleted successfully";
    } else {
        echo "Error deleting job: " . $conn->error;
    }
    
    $stmt->close();
} else {
    echo "Invalid job ID";
}

// Close the database connection
$conn->close();
?>
