<?php
include('offline.php');  // Include your database connection file

// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Check if patient_id is provided in the URL
if (isset($_GET['patient_id']) && !empty($_GET['patient_id'])) {
    $patient_id = mysqli_real_escape_string($conn, $_GET['patient_id']);  // Sanitize the patient_id

    // Check if the patient exists in the database before attempting to delete
    $check_query = "SELECT * FROM patients WHERE patient_id='$patient_id' LIMIT 1";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Patient exists, proceed with deletion

        // Delete related orders from the order_assignments table
        $delete_orders_query = "DELETE FROM order_assignments WHERE order_id='$patient_id'";
        mysqli_query($conn, $delete_orders_query);

        // Delete the patient from the patients table
        $delete_patient_query = "DELETE FROM patients WHERE patient_id='$patient_id'";
        
        if (mysqli_query($conn, $delete_patient_query)) {
            echo "<script>alert('Patient deleted successfully.');</script>";
            echo "<meta http-equiv='refresh' content='0;url=manage_ppatients'/>";  // Redirect to the manage patients page
        } else {
            echo "<script>alert('Error deleting patient. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Patient not found.');</script>";
        echo "<meta http-equiv='refresh' content='0;url=manage_ppatients'/>";  // Redirect if patient not found
    }
} else {
    echo "<script>alert('Invalid patient ID.');</script>";
    echo "<meta http-equiv='refresh' content='0;url=manage_ppatients'/>";  // Redirect if no patient_id is passed
}

mysqli_close($conn);  // Close the database connection
?>
