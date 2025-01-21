<?php
session_start();

include("offline.php");

$blog_id=$_POST['blog_id'];

$blog_name=$_POST['name'];
          
$blog_desc=$_POST['description'];
          

$edit_blog="UPDATE blog SET blog_title='$blog_name', blog_desc='$blog_desc' WHERE blog_id='$blog_id'";

if (mysqli_query($conn, $edit_blog)) {

       
	   echo "<meta http-equiv=\"refresh\" content=\"0;url=mess.php?msg_id=njIuPM\"/>";

    
    
}
else{
	echo "Error: " . $edit_blog . "<br>" . mysqli_error($conn);
}



mysqli_close($conn);


?>
















