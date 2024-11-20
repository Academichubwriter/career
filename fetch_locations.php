<?php
// Connect to your MySQL database
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

// Fetch data from the locations table
$sql = "SELECT * FROM locations";
$result = $conn->query($sql);

// Store results in an array
$locations = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row;
    }
}

// Close connection
$conn->close();

// Output locations data in JSON format
header('Content-Type: application/json');
echo json_encode($locations);
?>
