<?php
// Include your database connection file
include 'offline.php'; // Replace with your database connection file



    $branch_id = $_GET['branch_id'];

        $delete_query = "DELETE FROM taiyo_branchlogins WHERE access_id = '$branch_id'";
        
        if (mysqli_query($conn, $delete_query)) {

          header("Location:manage_branchlogins");
        exit;


        } else {
            echo "Error deleting branch: " . mysqli_error($conn);
        }


// Close the database connection
mysqli_close($conn);
?>
