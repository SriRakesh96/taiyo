<?php

include ('offline.php');

$msg_id=$_POST['msg_id'];

$rep_msg=$_POST['reply_msg'];

$upd_reply="UPDATE contact_us SET adm_reply='$rep_msg', act='1' WHERE msg_id='$msg_id'";

if (mysqli_query($conn, $upd_reply)) {
  
       echo "<meta http-equiv=\"refresh\" content=\"1;url=mess.php?msg_id=sxmzBf\" />";

}


else{
	echo "Error: " . $upd_reply . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);



?>

