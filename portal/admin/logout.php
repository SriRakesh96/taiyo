<?php
// Include database connection or other required files
include('offline.php');

// Start the session if you're using sessions
session_start();

// Clear the cookies for the admin user
if (isset($_COOKIE['adm_email'])) {
    setcookie('adm_email', '', time() - 3600, '/', '', false, true);
}

if (isset($_COOKIE['adm_password'])) {
    setcookie('adm_password', '', time() - 3600, '/', '', false, true);
}

// Optionally, destroy the session if you're using sessions
session_destroy();

// Redirect to the login page or home page
header("Location: index.php");
exit();
?>