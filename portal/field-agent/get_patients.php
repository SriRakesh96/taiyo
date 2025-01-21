<?php
// Include database connection file
include('offline.php');


if (isset($_GET['branch']) && isset($_GET['access_id'])) {

    $branch =  $_GET['branch'];
    $access_id = $_GET['access_id'];

    // Fetching patient data from the database where the zone matches and the patient status is not 'declined' by the current user
    $patient_fetch = "
        SELECT * 
        FROM patients 
        WHERE branch = '$branch' 
        AND act = '2' 
        AND status = 'accept' AND updated_by = '$access_id' AND prog=''
        ORDER BY id DESC
    ";
    
    // Run the query
    $fetch_query = mysqli_query($conn, $patient_fetch);

    // Initialize an array to store patient data
    $patients = [];

    // Check if there are any results and fetch them
    while ($row = mysqli_fetch_assoc($fetch_query)) {
        $patients[] = [
            'patient_id' => $row['patient_id'],
            'trf' => $row['trf_form'],
            'c_i' => $row['collected_items'],
            'c_type' => $row['collection_type'],
            'address' => $row['address']
        ];
    }

    // Return the data as a JSON response
    echo json_encode($patients);
} else {
    // If zone or access_id is not set, return an empty array
    echo json_encode([]);
}
?>
