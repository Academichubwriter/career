<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "maps";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO locations (name, latitude, longitude, job_title, country, job_type, average_salary, posted_time, organization, description) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)");
    $stmt->bind_param("sddsssdss", $name, $latitude, $longitude, $job_title, $country, $job_type, $average_salary, $organization, $description);

    // Set parameters
    $name = $_POST['location'] ?? '';
    $latitude = $_POST['lat'] ?? '';
    $longitude = $_POST['lon'] ?? '';
    $job_title = $_POST['jobtitle'] ?? '';
    $country = $_POST['country'] ?? '';
    $job_type = $_POST['job_type'] ?? '';
    $average_salary = $_POST['salary'] ?? '';
    $organization = $_POST['organization'] ?? '';
    $description = $_POST['expected'] ?? '';

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
