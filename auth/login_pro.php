<?php
session_start();


if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:error.php?msg_id=lDcXhf');
    exit;
}



include("offline.php");

$email=$_POST['email'];

$password=$_POST['password'];


 $ip=$_SERVER['REMOTE_ADDR'];




/* Pass Hash */ 
 
$psw_act = "SELECT * FROM super_admin WHERE email='$email' AND act='1'";


$psw_act_conn = mysqli_query($conn, $psw_act);

 while ($row = mysqli_fetch_array($psw_act_conn))
    {  
			$fetch_pass=$row['password'];											
	      

    }
 
  
  // Verify the hash against the password entered
  $verify = password_verify($password, $fetch_pass);
  
  /* Pass Hash */ 
  
   
if ($verify) {
     
     
$login_pro = "SELECT * FROM super_admin WHERE email='$email' AND act='1'";

$login_conn = mysqli_query($conn, $login_pro);


                if (mysqli_num_rows($login_conn) > 0) {
         
    
                        $_SESSION['sess_adm_email']=$email;

                        $_SESSION['sess_adm_password']=$password;

 
	       
	   echo "<meta http-equiv=\"refresh\" content=\"0;url=dashboard.php\" />"; 
        
    
    
}
}

else {

echo "<meta http-equiv=\"refresh\" content=\"0;url=error.php?msg_id=jGRjex\" />"; 
}


mysqli_close($conn);

?>