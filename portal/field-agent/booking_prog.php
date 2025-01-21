<?php

include('offline.php');


if (!empty($_COOKIE['fagn_email']) && !empty($_COOKIE['fagn_password'])) {
    $cookie_email = $_COOKIE['fagn_email'];
    $cookie_password = $_COOKIE['fagn_password'];


    $user_data = "SELECT * FROM taiyo_fagent WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $ename = $row6['name'];
        $branchn = $row6['branch_name'];
        

    }
// Check if the required parameters are present in the URL
if (isset($_GET['id']) && isset($_GET['act'])) {
    $patient_id = $_GET['id'];
    $action = $_GET['act']; // Accept or decline


    // Validate action
    if ($action === 'done') {
        $query = "UPDATE patients SET act = 2, updated_on = '$ltz', prog='done' WHERE patient_id = '$patient_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {


header("Location:manage_bookings");
        exit;
        } else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=jn63eJ\" />";
        }
    } elseif ($action === 'transfer') {
        
    echo "<meta http-equiv=\"refresh\" content=\"0;url=transfer?pat_id=$patient_id\" />";
       
    }
    
    
  
} else {
    echo "<script>alert('Invalid request. Missing parameters.'); window.location.href = 'bookings.php';</script>";
}



} else {
    // Redirect if the cookies are not set or invalid
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=jn63eJ\" />";
}
?>
