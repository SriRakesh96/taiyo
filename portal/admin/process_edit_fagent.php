<?php
include('offline.php');

if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the agent ID from the hidden input field
        $fagnt_id = $_POST['adm_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Prepare the update query for name, email, and phone only
        $update_query = "UPDATE taiyo_fagent SET name='$name', email='$email', phone='$phone' WHERE access_id='$fagnt_id'";

        // Execute the update query
        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Field agent updated successfully!'); window.location.href='manage_fagnt';</script>";
        } else {
            echo "<script>alert('Error updating field agent.'); window.location.href='manage_fagnt';</script>";
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