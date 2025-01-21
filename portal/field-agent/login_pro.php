<?php
ob_start();

include('offline.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = check_input($_POST['email']);
    $password = check_input($_POST['password']);
    $ip = $_SERVER['REMOTE_ADDR'];

    // Query to fetch user details
    $psw_act = "SELECT * FROM taiyo_fagent WHERE email='$email' AND act='1'";
    $psw_act_conn = mysqli_query($conn, $psw_act);

    $access_id = null;
    $fetch_pass = null;

    while ($row = mysqli_fetch_array($psw_act_conn)) {  
        $access_id = $row['access_id'];
        $fetch_pass = $row['password'];										
    }

    // Verify the password
    $verify = password_verify($password, $fetch_pass);

    if ($verify) {
        $login_pro = "SELECT * FROM taiyo_fagent WHERE email='$email' AND act='1'";
        $login_conn = mysqli_query($conn, $login_pro);

        if (mysqli_num_rows($login_conn) > 0) {
            // Fetch user_id
            $user_row = mysqli_fetch_array($login_conn);
            $user_id = $user_row['access_id'];

            // Set cookies
            setcookie('fagn_email', $email, time() + 2678400, '/', '', false, true);
            setcookie('fagn_password', $password, time() + 2678400, '/', '', false, true);

            // Log login
            $log_query = "INSERT INTO login_logs (email, user_id) VALUES ('$email', '$user_id')";
            if (mysqli_query($conn, $log_query)) {
                header("Location: dashboard");
                exit;
            } else {
                echo "Error logging login: " . mysqli_error($conn);
            }
        }
    } else {
        header("Location: invalid?ms_id=xF5hCV");
        exit;
    }
} else {
    header("Location: invalid?ms_id=bWr725");
    exit;
}

mysqli_close($conn);
ob_end_flush();
?>
