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
$numbers = rand(10, 99);
$prefix = "TAI_BRANCH-";
$sufix = time();

$branch_id = $prefix . $sufix;


$zones=strtoupper($_POST['zone']);


$branch=strtoupper($_POST['branch_name']);



$adm_ins="INSERT INTO `taiyo_branches` (`id`, `branch_id`, `zone_id`, `branch_area`, `added_on`, `act`)
VALUES (NULL, '$branch_id', '$zones', '$branch', '$ltz', '1');";

if(mysqli_query($conn, $adm_ins)){

   echo "<meta http-equiv=\"refresh\" content=\"0;url=manage_branches\" />";

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
