<?php
$servername = "localhost";
$username = "taiyo4hb_taiyouser";
$password = "Taiyo@2022";
$dbname = "taiyo4hb_taiyolabs";
date_default_timezone_set('Asia/Kolkata');
$ltz = date("Y-m-d h:i:s");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>



