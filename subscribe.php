<?php

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email and category from the POST data
    $email = $_POST['email'];
    $category = $_POST['category'];

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

    // Fetch jobs from the database based on the selected category
    $sql = "SELECT * FROM jobs WHERE category = '$category'";
    $result = $conn->query($sql);

    // Check if there are any errors in the query
    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    // Check if there are any jobs for the selected category
    if ($result->num_rows > 0) {
        // Initialize the message body
        $message = "Jobs in the $category category:\n\n";

        // Append each job to the message body
        while ($row = $result->fetch_assoc()) {
            $message .= "Title: " . $row["title"] . "\n";
            $message .= "Description: " . $row["description"] . "\n";
            $message .= "Location: " . $row["location"] . "\n\n";
        }

        // Send the email to the user
        $subject = "Job Alert: New Jobs in the $category Category";
        $headers = "From: info@career-link.com";
        mail($email, $subject, $message, $headers);

        // Output a success message
        echo "Subscription request received. Jobs in the $category category have been sent to $email.";
    } else {
        // Output a message if there are no jobs for the selected category
        echo "Subscription request received. There are no jobs in the $category category.";
    }

    // Close the database connection
    $conn->close();
} else {
    // If the request method is not POST, return an error
    http_response_code(405);
    echo "Method Not Allowed";
}
