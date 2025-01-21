<?php
include('offline.php');  // Include your database connection file
// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];
    

    $user_data = "SELECT * FROM taiyo_admin WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $name = $row6['name'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get posted data
        $patient_id = $_POST['patient_id'];
        $collected_items = mysqli_real_escape_string($conn, $_POST['collected_items']);
        $collection_type = mysqli_real_escape_string($conn, $_POST['collection_type']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $branch=$_POST['branch'];
        
        // If no address is required (collection_type = Lab), set it to NULL
        if ($collection_type != 'HomePickup') {
            $address = NULL;
        }

        // Handle file upload
        $trf_form = null;
        if (isset($_FILES['trf_form']) && $_FILES['trf_form']['error'] == 0) {
            // Handle file upload logic
            $file_name = $_FILES['trf_form']['name'];
            $file_tmp_name = $_FILES['trf_form']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = ['jpg', 'jpeg', 'png', 'pdf']; // Allowed file types

            if (in_array($file_ext, $allowed_exts)) {
                $new_file_name = $patient_id . '.' . $file_ext; // Rename the file with patient ID
                $target_dir = '../trf_forms/'; // Upload directory
                $target_file = $target_dir . $new_file_name;

                // Upload the file
                if (move_uploaded_file($file_tmp_name, $target_file)) {
                    $trf_form = $target_file; // Set the file path for database update
                } else {
                    echo "<script>alert('Error uploading the TRF file.');</script>";
                }
            } else {
                echo "<script>alert('Invalid file type. Only JPG, PNG, JPEG, and PDF are allowed.');</script>";
            }
        }

        // Update patient details in the database
        $update_query = "
            UPDATE patients 
            SET 
                branch='$branch',
                collected_items='$collected_items', 
                collection_type='$collection_type', 
                address='$address', status='', updated_by=''
        ";

        // If a new TRF file was uploaded, update the TRF form field
        if ($trf_form) {
            $update_query .= ", trf_form='$trf_form'";  // Add the file path to the update query
        }

        $update_query .= " WHERE patient_id='$patient_id'";

        if (mysqli_query($conn, $update_query)) {
            // If collection type is HomePickup, assign an agent
            if ($collection_type == 'HomePickup') {
                // Fetch all active agents in the same branch
                $agent_query = "SELECT * FROM taiyo_fagent WHERE branch='$branch' AND act=1";
                $agent_result = mysqli_query($conn, $agent_query);

                $agents = [];
                while ($row = mysqli_fetch_assoc($agent_result)) {
                    $agents[] = $row['access_id'];
                }

                if (!empty($agents)) {
                    // Shuffle agents for random distribution
                    shuffle($agents);

                    // Get current date to identify today's orders
                    $today_date = date('Y-m-d');

                    // Count orders assigned to each agent today
                    $assign_count_query = "
                        SELECT agent_id, COUNT(*) AS order_count 
                        FROM order_assignments 
                        WHERE branch_id='$branch' AND DATE(assigned_on)='$today_date' 
                        GROUP BY agent_id";
                    $assign_count_result = mysqli_query($conn, $assign_count_query);

                    $assign_counts = [];
                    while ($row = mysqli_fetch_assoc($assign_count_result)) {
                        $assign_counts[$row['agent_id']] = $row['order_count'];
                    }

                    // Default to zero for agents without assignments
                    foreach ($agents as $agent_id) {
                        if (!isset($assign_counts[$agent_id])) {
                            $assign_counts[$agent_id] = 0;
                        }
                    }

                    // Find the agent with the least orders
                    asort($assign_counts);
                    $selected_agent = key($assign_counts);

                    // Assign the order to the selected agent
                    $assign_query = "INSERT INTO `order_assignments` 
                                    (`order_id`, `agent_id`, `branch_id`, `assigned_on`) 
                                    VALUES 
                                    ('$patient_id', '$selected_agent', '$branch', NOW())";

                    if (mysqli_query($conn, $assign_query)) {
                        // Update the patients table to mark the assignment
                        $update_patient_query = "UPDATE `patients` 
                                                 SET  branch='$branch', act='2', `status` = 'accept', `updated_by` = '$selected_agent'
                                                 WHERE `patient_id` = '$patient_id'";

                        if (mysqli_query($conn, $update_patient_query)) {
                         
                            echo "<meta http-equiv='refresh' content='0;url=manage_ppatients'/>";  // Redirect to another page
                        } else {
                            echo "<script>alert('Error updating patient assignment.');</script>";
                        }
                    } else {
                        echo "<script>alert('Error assigning agent.');</script>";
                    }
                } else {
                    echo "<script>alert('No active agents found for this branch.');</script>";
                }
            } else {
                echo "<script>alert('Patient details updated successfully.');</script>";
                echo "<meta http-equiv='refresh' content='0;url=manage_ppatients'/>";  // Redirect to another page
            }
        } else {
            echo "<script>alert('Error updating patient details. Please try again.');</script>";
        }
    }
} else {
    echo "<meta http-equiv='refresh' content='0;url=invalid.php?ms_id=jn63eJ' />";  // Redirect to login page
}
?>
