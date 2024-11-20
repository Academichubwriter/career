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

// Get user input from query parameter
$userInput = $_GET['query'];

// Fetch suggestions from the database
$sql = "SELECT name FROM locations WHERE name LIKE '%$userInput%' LIMIT 5"; // Adjust query to select from the "name" field
$result = $conn->query($sql);

// Store suggestions in an array
$suggestions = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row;
    }
}

// Close connection
$conn->close();

// Output suggestions in JSON format
header('Content-Type: application/json');
echo json_encode($suggestions);
?>
