<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:error.php?msg_id=lDcXhf');
    exit;
}


include('offline.php');

$booking_id=uniqid();


$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$test=$_POST['test'];

$address=$_POST['address'];



$ip=$_SERVER['REMOTE_ADDR'];


$cont_ins="INSERT INTO `bookings` (`id`, `booking_id`, `name`, `email`, `phone`, `test`, `address`, `book_date`, `ip`, `act`) 


VALUES (NULL, '$booking_id', '$name', '$email', '$phone', '$test', '$address', '$ltz', '$ip', '0')";


if (mysqli_query($conn,$cont_ins))
{

   
    echo "<meta http-equiv=\"refresh\" content=\"0;url=message.php?msg_id=YjRReb\" />";
}

else
{

    echo "<meta http-equiv=\"refresh\" content=\"0;url=error.php?msg_id=WpbyFM\" />";
}

mysqli_close($conn);


?>







