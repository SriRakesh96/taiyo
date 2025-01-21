<?php
// Include your database connection file
include 'offline.php'; // Replace with your database connection file



    $news_id = $_GET['news_id'];


        $delete_query = "UPDATE taiyo_news SET act='0' WHERE news_id = '$news_id'";
        
        if (mysqli_query($conn, $delete_query)) {

          header("Location:manage_news");
        exit;


        } else {
            echo "Error deleting branch: " . mysqli_error($conn);
        }


// Close the database connection
mysqli_close($conn);
?>
