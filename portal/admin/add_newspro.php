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
$prefix = "TAIYO-NEWS-";
$sufix = time();

$news_id = $prefix . $sufix;

$news=$_POST['news'];


$branch_id=$_POST['branch'];

// Fetch locations for dropdowns
$query = "SELECT * FROM taiyo_branches WHERE branch_id='$branch_id' AND act = 1 ORDER BY id";
$result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
      
      $branch_name=$row['branch_area'];
      
}



   
$ip=$_SERVER['REMOTE_ADDR'];



$adm_ins="INSERT INTO `taiyo_news` (`id`, `news_id`, `branch_id`, `branch_name`, `news`, `added_on`, `act`) 

VALUES (NULL, '$news_id', '$branch_id', '$branch_name',  '$news', '$ltz', '1');";


if(mysqli_query($conn, $adm_ins)){

   echo "<meta http-equiv=\"refresh\" content=\"0;url=manage_news\" />";

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
