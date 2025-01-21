<?php

include ('offline.php');




$adm_id=$_POST['adm_id'];

$name=$_POST['name'];


$email=$_POST['email'];

$support_email=$_POST['s_email'];

$phone=$_POST['phone'];


$address=$_POST['address'];



$upd_details="UPDATE website SET name='$name', email='$email', support_email='$support_email', phone='$phone', address='$address' WHERE adm_id='$adm_id'";

if (mysqli_query($conn, $upd_details)) {
  
echo "<meta http-equiv=\"refresh\" content=\"0;url=mess.php?msg_id=zjUueU\"/>";

}


else{
	echo "Error: " . $upd_profile . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);



?>

