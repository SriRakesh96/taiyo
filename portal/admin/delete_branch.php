<?php
// Include your database connection file
include 'offline.php'; // Replace with your database connection file



    $branch_id = $_GET['adm_id'];

        $delete_query = "UPDATE taiyo_branches SET act='0' WHERE branch_id = '$branch_id'";
        
        if (mysqli_query($conn, $delete_query)) {

          header("Location:manage_branches");
        exit;


        } else {
            echo "Error deleting branch: " . mysqli_error($conn);
        }


// Close the database connection
mysqli_close($conn);
?>
