<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logins";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process employer signup form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employer_full_name = $_POST['employer_full_name'];
    $employer_email = $_POST['employer_email'];
    $employer_company_name = $_POST['employer_company_name'];
    $employer_contact_person = $_POST['employer_contact_person'];
    $employer_password = password_hash($_POST['employer_password'], PASSWORD_DEFAULT); // Hash password for security

    // Insert employer data into the database
    $sql = "INSERT INTO employers (full_name, email, company_name, contact_person, password) 
            VALUES ('$employer_full_name', '$employer_email', '$employer_company_name', '$employer_contact_person', '$employer_password')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to home.html
        header("Location: employer.html");
        exit(); // Make sure to exit after the redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
