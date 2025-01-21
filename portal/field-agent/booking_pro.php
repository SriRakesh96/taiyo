<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

header('Access-Control-Allow-Origin: *'); // Allow cross-origin requests (for testing, replace * with your domain in production)
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

include('offline.php');

if (!empty($_COOKIE['fagn_email']) && !empty($_COOKIE['fagn_password'])) {
    $cookie_email = $_COOKIE['fagn_email'];
    $cookie_password = $_COOKIE['fagn_password'];


    $user_data = "SELECT * FROM sptvsp_fagent WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $ename = $row6['name'];
        

    }
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate booking ID
    $booking_id = "SPTB-" . time();

    // Sanitize form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $lati = mysqli_real_escape_string($conn, $_POST['lati']);
    $longi = mysqli_real_escape_string($conn, $_POST['longi']);
    $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
$city=$_POST['city'];
$area=$_POST['area'];
    // Handle electricity bill upload
    $main_folder = 'uploads/' . $booking_id;
    $electricity_folder = $main_folder . '/electricity_bill';
    $gallery_folder = $main_folder . '/gallery';

    if (!file_exists($electricity_folder)) mkdir($electricity_folder, 0777, true);
    if (!file_exists($gallery_folder)) mkdir($gallery_folder, 0777, true);

    // Handle electricity bill upload
    $electricity_bill_path = '';
    if (isset($_FILES['electricity_bill'])) {
        $electricity_bill_path = $electricity_folder . '/' . basename($_FILES['electricity_bill']['name']);
        if (!move_uploaded_file($_FILES['electricity_bill']['tmp_name'], $electricity_bill_path)) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload electricity bill.']);
            exit();
        }
    }

    // Handle gallery uploads
    $gallery_images = [];
    if (isset($_FILES['gallery'])) {
        foreach ($_FILES['gallery']['tmp_name'] as $index => $tmpName) {
            $gallery_image_path = $gallery_folder . '/' . ($index + 1) . '.' . pathinfo($_FILES['gallery']['name'][$index], PATHINFO_EXTENSION);
            if (move_uploaded_file($tmpName, $gallery_image_path)) {
                $gallery_images[] = $gallery_image_path;
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload gallery images.']);
                exit();
            }
        }
    }

    // Generate OTP and expiry
    $otp = rand(100000, 999999);
    $otp_expiry = time() + (5 * 60); // OTP valid for 5 minutes
$_SESSION['bkng']=$booking_id;

    // Insert booking details into the database
    $query = "INSERT INTO sptvsp_bookings (booking_id, name, email, phone, address, lati, longi, city, area,  booking_date, electricity_bill, gallery_images, otp, otp_expiry, created_at, created_by, created_id, emp_name, act) 
              VALUES ('$booking_id', '$name', '$email', '$phone', '$address', '$lati', '$longi', '$city', '$area', '$booking_date', '$electricity_bill_path', '" . json_encode($gallery_images) . "', '$otp', '$otp_expiry', '$ltz', '$type', '$access_id', '$ename', '0')";

    if (mysqli_query($conn, $query)) {
        
        
$fields = array(
    "message" => "Hello $name, Your OTP is : $otp. Use this OTP for further Process Thanks",
    "language" => "english",
    "route" => "q",
    "numbers" => "$phone",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: PpSYONQ2V8kWMyIw9Egxmrz3UcFtoqBsK70CdjvRe5iLHaAubGpAMfRrtxTPeWJZ8iLV0vol1bSh5QCU",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


        echo json_encode(['status' => 'success', 'message' => 'Booking created. Enter OTP to confirm.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to submit booking.']);
    }
}


} else {
    // Redirect if the cookies are not set or invalid
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=jn63eJ\" />";
}
?>
