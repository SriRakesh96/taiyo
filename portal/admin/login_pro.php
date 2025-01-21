<?php

include('offline.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = check_input($_POST['email']);
    $password = check_input($_POST['password']);

    $ip = $_SERVER['REMOTE_ADDR'];

    /* Pass Hash */ 
    $psw_act = "SELECT * FROM taiyo_admin WHERE email='$email' AND act='1'";
    $psw_act_conn = mysqli_query($conn, $psw_act);

    while ($row = mysqli_fetch_array($psw_act_conn)) {  
        $access_id = $row['access_id'];
        $fetch_pass = $row['password'];										
    }
 
    // Verify the hash against the password entered
    $verify = password_verify($password, $fetch_pass);
   
    /* Pass Hash */ 
  
    if ($verify) {
        $login_pro = "SELECT * FROM taiyo_admin WHERE email='$email' AND act='1'";
        $login_conn = mysqli_query($conn, $login_pro);

        if (mysqli_num_rows($login_conn) > 0) {
            // Fetch user_id from the database
            $user_row = mysqli_fetch_array($login_conn);
            $user_id = $user_row['access_id'];

         
            setcookie('adm_email', $email, time() + 86400, '/', '', false, true); // 86400 seconds = 24 hours
            setcookie('adm_password', $password, time() + 86400, '/', '', false, true);

          
            $log_query = "INSERT INTO login_logs (email, user_id) VALUES ('$email', '$user_id')";
            if (mysqli_query($conn, $log_query)) {
               
          header("Location: dashboard");
exit;
            } else {
               
                echo "Error logging login: " . mysqli_error($conn);
            }
        }
    } else {
  echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=xF5hCV\" />"; 
    }
} else {

 echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=bWr725\" />"; 
}

mysqli_close($conn);
?>
