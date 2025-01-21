<?php
session_start();
// Include database connection or other required files
include('offline.php');


// Clear the cookies
if (isset($_COOKIE['fagn_email'])) {
    setcookie('fagn_email', '', time() - 3600, '/', '', false, true);
}

if (isset($_COOKIE['fagn_password'])) {
    setcookie('fagn_password', '', time() - 3600, '/', '', false, true);
}

// Optionally, destroy the session if you're using sessions
session_destroy();

// Redirect to the login page or home page
header("Location: index"); 
exit();
?>