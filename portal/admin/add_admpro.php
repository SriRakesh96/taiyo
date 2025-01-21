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


if ($_SERVER["REQUEST_METHOD"] == "POST") {


$letters = "ABCDGHJKMNOPQRSTUVWXYZ";
$numbers = rand(100, 999);
$prefix = "SPT-ADM-";
$sufix = time();

$adm_id = $prefix . $sufix;

$name=stripslashes($_POST['name']);

$phone=stripslashes($_POST['phone']);

$email=$_POST['email'];

$entered_password = $_POST['password'];
  // The hash of the password that
  // can be stored in the database
  $psw = password_hash($entered_password, PASSWORD_DEFAULT);
   
$ip=$_SERVER['REMOTE_ADDR'];



$adm_ins="INSERT INTO `taiyo_admin` (`id`, `access_id`, `access_type`, `name`, `email`, `phone`, `password`, `added_on`, `act`)

VALUES (NULL, '$adm_id', 'ADMIN', '$name', '$email', '$phone', '$psw', '$ltz', '1')";


if(mysqli_query($conn, $adm_ins)){

    header("Location: manage_admin");
        exit;

}

}
else{
    
   echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=bWr725\" />";
    
}


    
}
   
   else
{
       echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=jn63eJ\"/>";
}
mysqli_close($conn);
   
?>
