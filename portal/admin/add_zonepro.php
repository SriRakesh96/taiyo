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
$prefix = "TAI-ZONE-";
$sufix = time();

$zone_id = $prefix . $sufix;

$zones=strtoupper($_POST['zone']);


$zon_ins="INSERT INTO `taiyo_zones` (`zone_id`, `zone`, `added_on`, `act`) VALUES ('$zone_id', '$zones', '$ltz', '1');";

if(mysqli_query($conn, $zon_ins)){

   echo "<meta http-equiv=\"refresh\" content=\"0;url=manage_zones\" />";

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
