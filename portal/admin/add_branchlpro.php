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



$name=stripslashes($_POST['name']);

$phone=stripslashes($_POST['phone']);

$email=$_POST['email'];

$branch=$_POST['branch'];


$query = "SELECT * FROM taiyo_branches WHERE branch_id='$branch' AND act = 1 ORDER BY id";
                                 $result = mysqli_query($conn, $query);
                                 
                                 while ($row56 = mysqli_fetch_assoc($result)) {
                                 
                                 $zone=$row56['zone_id'];
                                 
                                 $branchn=$row56['branch_area'];
                                 
                                 }
                                 
  // Fetch locations for dropdowns
$query2 = "SELECT * FROM taiyo_zones WHERE zone_id='$zone' AND act = 1 ORDER BY id";
$result2 = mysqli_query($conn, $query2);

  while ($row = mysqli_fetch_assoc($result2)) {
      
      $zone_name=$row['zone'];
      
}
                               

$entered_password = $_POST['password'];
  // The hash of the password that
  // can be stored in the database
  $psw = password_hash($entered_password, PASSWORD_DEFAULT);
   
$ip=$_SERVER['REMOTE_ADDR'];



$adm_ins="INSERT INTO `taiyo_branchlogins` (`id`, `access_id`, `branch`, `zone`, `zone_name`, `access_type`, `name`, `email`, `phone`, `password`, `added_on`, `act`)

VALUES (NULL, '$branch', '$branchn', '$zone', '$zone_name', 'BRANCH', '$name', '$email', '$phone', '$psw', '$ltz', '1')";


if(mysqli_query($conn, $adm_ins)){

   echo "<meta http-equiv=\"refresh\" content=\"0;url=manage_branchlogins\" />";

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
