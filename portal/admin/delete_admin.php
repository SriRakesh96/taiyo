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
  $adm_id=$_GET['adm_id'];
    
      $del_adm="DELETE FROM taiyo_admin WHERE access_id='$adm_id'";
          
      if (mysqli_query($conn,$del_adm)){
           
     echo "<meta http-equiv=\"refresh\" content=\"0;url=manage_admin.php\" />";


}

else{

   echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=bfg625\" />";

}

}
else
{
       echo "<meta http-equiv=\"refresh\" content=\"1;url=invalid.php?ms_id=jn63eJ\"/>";
}
  
mysqli_close($conn); 
?>