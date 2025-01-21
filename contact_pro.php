<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:error.php?msg_id=lDcXhf');
    exit;
}


include('offline.php');

$msg_id=uniqid();


$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$message=$_POST['message'];

$ip=$_SERVER['REMOTE_ADDR'];


$cont_ins="INSERT INTO `contact_us` (`id`, `msg_id`,  `name`, `email`, `phone`, `message`, `msg_time`, `ip`, `act`) 

VALUES (NULL, '$msg_id', '$name', '$email', '$phone', '$message', '$ltz', '$ip', '0')";


if (mysqli_query($conn,$cont_ins))
{

   
    echo "<meta http-equiv=\"refresh\" content=\"0;url=message.php?msg_id=YxQReb\" />";
}

else
{

    echo "<meta http-equiv=\"refresh\" content=\"0;url=error.php?msg_id=WpbyFM\" />";
}

mysqli_close($conn);


?>







