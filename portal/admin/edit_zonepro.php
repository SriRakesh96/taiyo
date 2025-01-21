<?php
include('offline.php');

if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];

    $user_data = "SELECT * FROM taiyo_admin WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $name = $row6['name'];
    }

    // Debugging: Log and display the request method
$request_method = $_SERVER['REQUEST_METHOD'];

    if ($request_method === "POST") {


        $zone_id = $_POST['zone_id'];
        $zone_name = stripslashes($_POST['zone']);

        $upd_zone = "
            UPDATE taiyo_zones 
            SET zone = '$zone_name' 
            WHERE zone_id = '$zone_id' AND act = '1'
        ";

        if (mysqli_query($conn, $upd_zone)) {
            if (mysqli_affected_rows($conn) > 0) {
              //  echo "Update successful.";
               // echo "<meta http-equiv=\"refresh\" content=\"0;url=manage_zones.php\" />";
               header("Location: manage_zones.php");
                exit(); // Always call exit after a header redirect
            } else {
                echo "No rows updated. Check zone_id and act field.";
            }
        } else {
            echo "Update query failed: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request method. Method: $request_method";
    }
} else {
    echo "No direct access allowed.";
}
mysqli_close($conn);
