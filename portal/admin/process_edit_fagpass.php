<?php
include('offline.php');

if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];

    // Fetch the agent's ID from the URL
    if (isset($_GET['adm_id'])) {
        $fagnt_id = $_GET['adm_id'];
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate password criteria
        if ($new_password !== $confirm_password) {
            echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
            exit();
        } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $new_password)) {
            echo "<script>alert('Password must be at least 8 characters long, contain letters, numbers, and at least one special character.'); window.history.back();</script>";
            exit();
        } else {
            // Hash the new password before storing it
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $update_query = "UPDATE taiyo_fagent SET password='$hashed_password' WHERE access_id='$fagnt_id'";

            if (mysqli_query($conn, $update_query)) {
                echo "<script>alert('Password updated successfully!'); window.location.href='manage_fagnt';</script>";
            } else {
                echo "<script>alert('Error updating password.'); window.history.back();</script>";
            }
        }
    } else {
        // Redirect if the request method is not POST
        header("Location: manage_fagnt");
        exit();
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>