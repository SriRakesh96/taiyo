<?php
include('offline.php');

if (!empty($_COOKIE['fagn_email']) && !empty($_COOKIE['fagn_password'])) {
    $cookie_email = $_COOKIE['fagn_email'];
    $cookie_password = $_COOKIE['fagn_password'];

    $user_data = "SELECT * FROM taiyo_fagent WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $access_id = $row6['access_id'];
        $branch = $row6['branch'];
        $ename = $row6['name'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get POST data
        $pat_id = mysqli_real_escape_string($conn, $_POST['pat_id']);
        $agent_id = mysqli_real_escape_string($conn, $_POST['agent_id']);


    

        // Check if patient exists
        $patient_check = "SELECT * FROM patients WHERE patient_id='$pat_id' AND branch='$branch'";
        $patient_result = mysqli_query($conn, $patient_check);

        if (mysqli_num_rows($patient_result) > 0) {
            // Update patient details
            $update_query = "
                UPDATE patients 
                SET status='accept', updated_by='$agent_id', misc='transferred', misc2='$access_id', misc_date='$ltz'
                WHERE patient_id='$pat_id'
            ";

            if (mysqli_query($conn, $update_query)) {
                echo "<script>alert('Booking successfully transferred.'); window.location.href='dashboard';</script>";
            } else {
                echo "<script>alert('Error updating record: " . mysqli_error($conn) . "'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Patient record not found or not accessible.'); window.history.back();</script>";
        }
    } else {
        // Invalid request method
        echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=invalidRequest\" />";
    }
} else {
    // Invalid session
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=sessionExpired\" />";
}

// Close the database connection
mysqli_close($conn);
?>
