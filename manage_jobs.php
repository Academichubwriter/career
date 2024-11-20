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

// Check if a job action is triggered (e.g., edit or delete)
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $job_id = $_POST['job_id'];
    
    // Handle the job action accordingly (e.g., update or delete)
    if($action == 'edit') {
        // Perform edit operation
        echo "Editing job with ID: " . $job_id;
    } elseif($action == 'delete') {
        // Perform delete operation
        echo "Deleting job with ID: " . $job_id;
    }
}

// Fetch job listings from the database
$sql = "SELECT id, title, description, created_at FROM jobs";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Management</title>
</head>
<body>
    <h1>Job Management</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    // Form for handling job actions (edit and delete)
                    echo "<td>";
                    echo "<form action='manage_jobs.php' method='post'>";
                    echo "<input type='hidden' name='job_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit' name='action' value='edit'>Edit</button>";
                    echo "<button type='submit' name='action' value='delete'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No jobs found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
