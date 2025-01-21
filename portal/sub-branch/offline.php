<?php
// offline.php

$servername = "localhost";
$username = "taiyo4hb_PortUser";
$password = "TaiyoPort2025";
$dbname = "taiyo4hb_taiyoPort25";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//Local Time Zone
date_default_timezone_set('Asia/Kolkata');
$ltz = date("Y-m-d H:i:s");

/* Form POst Validation Function */

function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>
