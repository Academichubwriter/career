<?php
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

// Fetch candidate applications from the database
$sql = "SELECT * FROM candidates";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='border px-4 py-2'>" . $row["name"] . "</td>";
        echo "<td class='border px-4 py-2'>" . $row["email"] . "</td>";
        echo "<td class='border px-4 py-2'>";
        
        // Check file extension and generate link accordingly
        $fileExtension = pathinfo($row["resume_filename"], PATHINFO_EXTENSION);
        if (in_array($fileExtension, array("jpg", "jpeg", "png", "gif", "pdf"))) {
            echo "<a href='path_to_resumes/" . $row["resume_filename"] . "' target='_blank'>View Resume</a>";
        } else {
            echo "Unsupported format";
        }
        
        echo "</td>";
        echo "<td class='border px-4 py-2'>";
        echo "<button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded view-details'>View Details</button>";
        echo "<button class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded reject'>Reject</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No applications found.</td></tr>";
}

// Close the database connection
$conn->close();
?>
