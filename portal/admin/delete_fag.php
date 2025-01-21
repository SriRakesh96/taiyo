<?php
// Include your database connection file
include 'offline.php'; // Replace with your database connection file



    $access_id = $_GET['adm_id'];

        $delete_query = "UPDATE taiyo_fagent SET act='0' WHERE access_id = '$access_id'";
        
        if (mysqli_query($conn, $delete_query)) {

          header("Location:manage_fagnt");
        exit;


        } else {
            echo "Error deleting branch: " . mysqli_error($conn);
        }


// Close the database connection
mysqli_close($conn);
?>
