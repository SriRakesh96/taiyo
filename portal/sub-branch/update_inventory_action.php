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
    
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $r=time();
    $idd="$id$r";
    $quantity = $_POST['quantity'];
    $damage_status = $_POST['damage_status'];

    $damage_image_path = null;

    // If damage image is uploaded
    if ($damage_status === 'Yes' && isset($_FILES['damage_image']) && $_FILES['damage_image']['error'] === 0) {
        $folder_path = "../damaged_items/" . $access_id ."/";
        if (!is_dir($folder_path)) {
            mkdir($folder_path, 0755, true);
        }

        $file_extension = pathinfo($_FILES['damage_image']['name'], PATHINFO_EXTENSION);
        $target_file = $folder_path . "damage_" . $idd . "." . $file_extension;

        if (move_uploaded_file($_FILES['damage_image']['tmp_name'], $target_file)) {
            $damage_image_path = $target_file;
        }
    }

    // Update inventory
    $query = "UPDATE inventory SET quantity = '$quantity', damage = '$damage_status'";
    if ($damage_image_path) {
        $query .= ", damage_photo = '$damage_image_path'";
    }
    $query .= " WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: manage_inventory.php?success=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
