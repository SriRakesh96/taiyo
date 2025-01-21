<?php
include('offline.php');
if (!empty($_COOKIE['eng_email']) && !empty($_COOKIE['eng_password'])) {
    $cookie_email = $_COOKIE['eng_email'];
    $cookie_password = $_COOKIE['eng_password'];

    // Fetch user details
    $user_data = "SELECT * FROM taiyo_branchlogins WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $name = $row6['name'];
        $empcity = $row6['city'];
    }

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_type = $_POST['item_type'];
    $quantity = intval($_POST['quantity']);
    $received_on = $_POST['received_on'];
    $received_by = $_POST['received_by'];
    $damage = $_POST['damage'];
    $damage_photo_path = null;

    // If "Other" is selected, handle the new item name
    if ($item_type === "Other" && !empty($_POST['other_item_name'])) {
        $new_item_name = mysqli_real_escape_string($conn, $_POST['other_item_name']);

        // Check if the item already exists
        $check_query = "SELECT id FROM inventory_items WHERE item_name = '$new_item_name'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) === 0) {
            // Insert the new item into inventory_items
            $insert_item_query = "INSERT INTO inventory_items (item_name) VALUES ('$new_item_name')";
            if (!mysqli_query($conn, $insert_item_query)) {
                echo "Error adding new item: " . mysqli_error($conn);
                exit;
            }
        }

        // Set $item_type to the new item name
        $item_type = $new_item_name;
    }

    // Create a folder for this access ID if it does not exist
    $folder_path = "../damaged_items/" . $access_id;
    if (!is_dir($folder_path)) {
        mkdir($folder_path, 0755, true); // Create folder with appropriate permissions
    }

    // Insert inventory details into the inventory table
    $query = "INSERT INTO inventory (access_id, item_type, quantity, received_on, received_by, damage) 
              VALUES ('$access_id', '$item_type', $quantity, '$received_on', '$received_by', '$damage')";
    if (mysqli_query($conn, $query)) {
        $inventory_id = mysqli_insert_id($conn); // Get the last inserted ID for naming

        // If there is damage and a file is uploaded
        if ($damage === "Yes" && isset($_FILES['damage_photo']) && $_FILES['damage_photo']['error'] === 0) {
            // Handle file upload
            $file_extension = pathinfo($_FILES['damage_photo']['name'], PATHINFO_EXTENSION);
            $target_file = $folder_path . "/damage_" . $inventory_id . "." . $file_extension;

            if (move_uploaded_file($_FILES['damage_photo']['tmp_name'], $target_file)) {
                $damage_photo_path = $target_file;

                // Update the record with the damage photo path
                $update_query = "UPDATE inventory SET damage_photo = '$damage_photo_path' WHERE id = $inventory_id";
                if (!mysqli_query($conn, $update_query)) {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                echo "Error uploading the file.";
            }
        }
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }

    // Redirect or display success message
    header("Location: manage_inventory.php");
    exit;
}

} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
