<?php
include('offline.php');

// Check if the form is submitted
$item_name=$_POST['item_nam'];


    // Insert the item into the database
    $insert_query = "INSERT INTO inventory_items (item_name) VALUES ('$item_name')";
    
    if (mysqli_query($conn, $insert_query)) {
        // Redirect back to the inventory management page or success page
      header("Location: manage_inventory.php");
    } else {
        // Error handling
        echo "Error: " . mysqli_error($conn);
    }

?>
