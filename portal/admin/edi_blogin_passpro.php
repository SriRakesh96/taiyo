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


if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    
    $branch_id=$_POST['branch_id'];
    

    $psw=$_POST['password'];
 

// The hash of the password that
  // can be stored in the database
  $password = password_hash($psw, PASSWORD_DEFAULT);



      // Update admin details in the database
            $upd_adm_pass = "
                UPDATE taiyo_branchlogins
                SET password = '$password' 
                WHERE access_id = '$branch_id'
            ";
if(mysqli_query($conn,$upd_adm_pass)){


     header("Location: manage_branchlogins");
        exit;

}

else{

echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=bfg625\" />";

}


}
else{
    
 echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=bWr725\" />";
    
}


}
   
   else
{
   echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\"/>";
}
mysqli_close($conn);
   
?>