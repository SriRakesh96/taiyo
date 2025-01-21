<?php
// Check if the patient ID is passed
if (isset($_POST['patient_id']) && !empty($_POST['patient_id'])) {
    $patient_id = $_POST['patient_id'];

    // Include your database connection
    include('offline.php');

    // Fetch the image file path from the database
    $query = "SELECT trf_form FROM patients WHERE patient_id = '$patient_id'";
    $result = mysqli_query($conn, $query);
    $patient = mysqli_fetch_assoc($result);

    if ($patient && !empty($patient['trf_form'])) {
        // Delete the image file from the server
        $image_path = $patient['trf_form'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Update the patient's record to null the image path
        $update_query = "UPDATE patients SET trf_form = NULL WHERE patient_id = '$patient_id'";
        mysqli_query($conn, $update_query);
    }

    // Close the database connection
    mysqli_close($conn);

    echo "Image deleted successfully.";
}
?>
