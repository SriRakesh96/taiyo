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
$prefix = "TAIYO-FAGNT-";
$sufix = time();

$adm_id = $prefix . $sufix;

$name=stripslashes($_POST['name']);

$phone=stripslashes($_POST['phone']);

$email=$_POST['email'];

$branch=$_POST['branch'];

// Fetch locations for dropdowns
$query = "SELECT * FROM taiyo_branches WHERE branch_id='$branch' AND act = 1 ORDER BY id";
$result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
      
      $branch_name=$row['branch_area'];
      
}


$entered_password = $_POST['password'];
  // The hash of the password that
  // can be stored in the database
  $psw = password_hash($entered_password, PASSWORD_DEFAULT);
   
$ip=$_SERVER['REMOTE_ADDR'];



$adm_ins="INSERT INTO `taiyo_fagent` (`id`, `access_id`, `branch`, `branch_name`, `access_type`, `name`, `email`, `phone`, `password`, `added_on`, `act`)

VALUES (NULL, '$adm_id', '$branch', '$branch_name', 'FIELD-AGENT', '$name', '$email', '$phone', '$psw', '$ltz', '1')";


if(mysqli_query($conn, $adm_ins)){

   echo "<meta http-equiv=\"refresh\" content=\"0;url=manage_fagnt\" />";

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
