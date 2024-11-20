<?php
session_start();

// Assume user role is stored in the session after login
$user_role = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'guest';

// Function to check if the user is logged in as an employer
function isEmployer() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'employer';
}

// Function to check if the user is logged in as a job seeker
function isJobSeeker() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'job_seeker';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content here -->
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="#">Job Search</a></li>
            <?php if (isJobSeeker()) : ?>
                <li>
                    <a href="#">For Job Seekers</a>
                    <ul class="submenu">
                        <li><a href="#">Upload Resume</a></li>
                        <li><a href="#">Set Job Alerts</a></li>
                        <li><a href="#">Career Resources</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (isEmployer()) : ?>
                <li>
                <li>
                <a href="#">For Employers</a>
                    <ul class="submenu">
                        <li><a href="#">Post a Job</a></li>
                        <li><a href="#">Manage Job Postings</a></li>
                        <li><a href="#">Candidate Applications</a></li>
            </li>
            </ul>
  
            <?php endif; ?>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="#">Blog</a></li>
            <?php if ($user_role === 'guest') : ?>
                <li><a href="login.html">Sign In</a></li>
            <?php else : ?>
                <li><a href="#">Profile</a></li>
            <?php endif; ?>
            <li><a href="#">FAQ</a></li>
        </ul>
    </nav>
</body>
</html>
