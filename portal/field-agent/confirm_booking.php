<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();


header('Access-Control-Allow-Origin: *'); // Allow cross-origin requests (for testing, replace * with your domain in production)
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

include('offline.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = mysqli_real_escape_string($conn, $_POST['otp']);

$booking_id=$_SESSION['bkng'];

    $query = "SELECT otp, otp_expiry FROM sptvsp_bookings WHERE booking_id = '$booking_id'";
    $result = mysqli_query($conn, $query);
    $booking = mysqli_fetch_assoc($result);

    if ($booking) {
        if ($booking['otp'] == $otp && time() <= $booking['otp_expiry']) {
            // Update booking status to confirmed
            $update_query = "UPDATE sptvsp_bookings SET act = 1 WHERE booking_id = '$booking_id'";
            mysqli_query($conn, $update_query);
            echo json_encode(['status' => 'success', 'message' => 'Booking confirmed.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid or expired OTP.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Booking not found.']);
    }
}
?>
