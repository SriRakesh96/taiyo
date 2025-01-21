<?php
// Include your database connection file
include 'offline.php'; // Ensure this points to your actual database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $branch_id = $_POST['access_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);



    // Update query
    $update_query = "
        UPDATE taiyo_branchlogins 
        SET name = '$name', email = '$email', phone = '$phone' 
        WHERE access_id = '$branch_id'
    ";

    // Execute the query
    if (mysqli_query($conn, $update_query)) {
        // Redirect on success
        header("Location: manage_branchlogins");
        exit;
    } else {
        // Display error if the query fails
        echo "Error updating branch: " . mysqli_error($conn);
    }
} else {
    // If the request method is not POST
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
