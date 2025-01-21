<?php
// Include database connection or other required files
include('offline.php');

// Start the session if you're using sessions
session_start();

// Clear the cookies for the engineer user
if (isset($_COOKIE['eng_email'])) {
    setcookie('eng_email', '', time() - 3600, '/', '', false, true);
}

if (isset($_COOKIE['eng_password'])) {
    setcookie('eng_password', '', time() - 3600, '/', '', false, true);
}

// Optionally, destroy the session if you're using sessions
session_destroy();

// Redirect to the login page or home page
header("Location: index.php"); 
exit();
?>