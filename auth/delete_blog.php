<?php
session_start();

include("offline.php");

$blog_id=$_GET['blog_id'];


$del_blog="UPDATE blog SET act='0' WHERE blog_id='$blog_id'";

if (mysqli_query($conn, $del_blog)) {

       
 echo "<meta http-equiv=\"refresh\" content=\"0;url=mess.php?msg_id=rgIWGv\"/>"; 
    
}
else{
	echo "Error: " . $del_blog . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);


?>

