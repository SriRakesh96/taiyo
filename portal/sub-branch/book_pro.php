<?php
include('offline.php'); // Database connection or required files

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if session or cookies are valid
    if (!empty($_COOKIE['eng_email']) && !empty($_COOKIE['eng_password'])) {
        $cookie_email = $_COOKIE['eng_email'];
        $cookie_password = $_COOKIE['eng_password'];

        $user_data = "SELECT * FROM taiyo_branchlogins WHERE email='$cookie_email'";
        $user_conn = mysqli_query($conn, $user_data);

        while ($row6 = mysqli_fetch_assoc($user_conn)) {
            $access_id = $row6['access_id']; // Logged-in user's branch ID
            $zone = $row6['zone'];
            
        
        }

        // Sanitize and fetch POST data
        $collected_items = mysqli_real_escape_string($conn, stripslashes($_POST['collected_items']));
        $collection_type = mysqli_real_escape_string($conn, stripslashes($_POST['collection_type']));
               
$query2 = "SELECT * FROM taiyo_branches WHERE branch_id='$access_id' AND act = 1 ORDER BY id";
$result2 = mysqli_query($conn, $query2);


while ($row56 = mysqli_fetch_assoc($result2)) {
    $zone = $row56['zone_id'];
    $branchn = $row56['branch_area'];
}

if($collection_type === "Lab"){
    
    $address=$branchn;
    
    
}

// Determine address based on collection type
$address = ($collection_type === "HomePickup") 
    ? mysqli_real_escape_string($conn, stripslashes($_POST['address'])) 
    : $branchn;


        // Generate a unique patient ID
        $patient_id = "PAT-" . time();

        // Handle file upload for TRF form
        if (isset($_FILES['trf_form']) && $_FILES['trf_form']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['trf_form']['name'];
            $file_tmp_name = $_FILES['trf_form']['tmp_name'];
            $file_size = $_FILES['trf_form']['size'];
            $file_error = $_FILES['trf_form']['error'];

            // Check file size and extension (adjust according to your needs)
            $allowed_extensions = ['pdf', 'jpg', 'jpeg', 'png'];
            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if (in_array($file_extension, $allowed_extensions) && $file_size <= 5000000) { // Limit to 5MB
                // Use the patient ID as the new file name, followed by the file extension
                $new_file_name = $patient_id . '.' . $file_extension;
                $upload_dir = '../trf_forms/';
                $upload_path = $upload_dir . $new_file_name;

                if (move_uploaded_file($file_tmp_name, $upload_path)) {
                    // File upload successful, proceed with database insertion
                    $trf_form_path = $upload_path;
                } else {
                    echo "Error uploading file.";
                    exit;
                }
            } else {
                echo "Invalid file type or file too large.";
                exit;
            }
        } else {
            echo "Error with file upload.";
            exit;
        }

        // Get current date and time
        $ltz = date('Y-m-d H:i:s');

if($collection_type === "Lab"){
    
    
     // Insert patient data into the database
        $patient_insert = "INSERT INTO `patients` 
        (`id`, `patient_id`, `collected_items`, `collection_type`, `address`, `added_on`, `trf_form`, `branch`, `zone`, `act`, `added_by`) 
        VALUES 
        (NULL, '$patient_id', '$collected_items', '$collection_type', '$branchn', '$ltz', '$trf_form_path', '$access_id', '$zone', '2', '$access_id')";
    
    
}

else if($collection_type === "HomePickup"){
    
    
     // Insert patient data into the database
        $patient_insert = "INSERT INTO `patients` 
        (`id`, `patient_id`, `collected_items`, `collection_type`, `address`, `added_on`, `trf_form`, `branch`, `zone`, `act`, `added_by`) 
        VALUES 
        (NULL, '$patient_id', '$collected_items', '$collection_type', '$address', '$ltz', '$trf_form_path', '$access_id', '$zone', '2', '$access_id')";
    
    
}
       

        if (mysqli_query($conn, $patient_insert)) {
      

            // Fetch all active agents in the same branch if collection_type is not 'Lab'
            $agent_query = "SELECT * FROM taiyo_fagent WHERE branch='$access_id' AND act=1";
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
                    WHERE branch_id='$access_id' AND DATE(assigned_on)='$today_date' 
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
                                ('$patient_id', '$selected_agent', '$access_id', '$ltz')";

                if (mysqli_query($conn, $assign_query)) {
                    // Update the patients table
                    $update_patient_query = "UPDATE `patients` 
                                             SET act='2', `status` = 'accept', `updated_by` = '$selected_agent'
                                             WHERE `patient_id` = '$patient_id'";

                    if (mysqli_query($conn, $update_patient_query)) {
                       if($collection_type === "HomePickup") {
                          
                                header("Location:manage_ppatients");
                                exit;
                        }
                        elseif($collection_type === "Lab"){
                            
                   
                          header("Location:lab_patients");
                          exit;
 
                        }
                    } else {
                        echo "Error updating patient: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error assigning agent: " . mysqli_error($conn);
                }
            } else {
                echo "No active agents found for this branch.";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=sessionExpired\" />";
    }
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=invalidRequest\" />";
}

// Close the database connection
mysqli_close($conn);
?>
