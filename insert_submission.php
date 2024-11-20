<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maps";

// Correct connection with the right variable
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize
    $first_name = $conn->real_escape_string($_POST["first"]);
    $last_name = $conn->real_escape_string($_POST["last"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $work_experience = $conn->real_escape_string($_POST["work_experience"]); // Work experience field from the second form
    $full_address = $conn->real_escape_string($_POST["location"]);
    $postal_code = $conn->real_escape_string($_POST["postal_code"]);
    $country = $conn->real_escape_string($_POST["country"]);
    $latitude = $conn->real_escape_string($_POST["lat"]);
    $longitude = $conn->real_escape_string($_POST["lon"]);

    // Prepare and bind parameters for the insert statement
    $stmt = $conn->prepare("INSERT INTO job_seeker_submissions (first_name,last_name,email,phone,work_experience,full_address,postal_code,country,latitude,longitude,time_submitted) 
                            VALUES (?,?,?,?,?,?,?,?,?,?,NOW())");
    $stmt->bind_param("ssssssssdd", $first_name, $last_name, $email, $phone, $work_experience, $full_address, $postal_code, $country, $latitude, $longitude);

    if ($stmt->execute()) {
        echo "New job seeker record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
