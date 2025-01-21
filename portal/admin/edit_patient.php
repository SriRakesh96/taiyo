<?php

include('offline.php');

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

    include('doctype.php');

    // Fetch patient details
    if (isset($_GET['patient_id'])) {
        $patient_id = mysqli_real_escape_string($conn, $_GET['patient_id']);
        $query = "SELECT * FROM patients WHERE patient_id='$patient_id'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $patient = mysqli_fetch_assoc($result);
        } else {
            echo "<meta http-equiv='refresh' content='0;url=invalid.php?ms_id=invalid_patient' />";
            exit;
        }
    } else {
        echo "<meta http-equiv='refresh' content='0;url=invalid.php?ms_id=missing_patient' />";
        exit;
    }
?>

<head>
    <title>Edit Patient - <?php echo $type; ?> </title>
    <?php include('head.php'); ?>
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <?php include('header.php'); ?>
        <?php include('home_sidebar.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Patient</h4>
                            </div>
                            <div class="card-body">
         <style>
    .large-radio {
        transform: scale(1.5); /* Makes the radio buttons bigger */
        margin-right: 10px; /* Adds space between the radio button and label */
    }

    .form-group label {
        font-size: 16px; /* Increase the size of the label text */
    }
</style>
<!-- Form to update patient details -->
<form action="update_patient" method="POST" enctype="multipart/form-data" onsubmit="showLoader()">
    <div class="form-row">
        <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">

        <!-- Collected Items (Radio Buttons) -->
        <div class="form-group col-lg-6 col-md-6">
            <label for="collected_items">Collected Items</label><br>
            <input type="radio" id="blood" name="collected_items" value="Blood" <?php echo $patient['collected_items'] == 'Blood' ? 'checked' : ''; ?> required class="large-radio">
            <label for="blood">Blood</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" id="urine" name="collected_items" value="Urine" <?php echo $patient['collected_items'] == 'Urine' ? 'checked' : ''; ?> required class="large-radio">
            <label for="urine">Urine</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" id="both" name="collected_items" value="Both(Urine+Blood)" <?php echo $patient['collected_items'] == 'Both(Urine+Blood)' ? 'checked' : ''; ?> required class="large-radio">
            <label for="both">Both</label>
        </div>

        <!-- Collection Type -->
        <div class="form-group col-md-6">
            <label for="collection_type">Collection Type</label>
            <select class="form-control" id="collection_type" name="collection_type" onchange="toggleAddressField()" required>
                <option value="Lab" <?php echo $patient['collection_type'] == 'Lab' ? 'selected' : ''; ?>>Lab</option>
                <option value="HomePickup" <?php echo $patient['collection_type'] == 'HomePickup' ? 'selected' : ''; ?>>Home Pickup</option>
            </select>
        </div>

        <!-- Address (Hidden initially) -->
        <div class="form-group col-md-12" id="address-field" style="<?php echo $patient['collection_type'] == 'HomePickup' ? 'display: block;' : 'display: none;'; ?>">
            <label for="address">Pickup Address</label>
            <textarea class="form-control" id="address" name="address" rows="3"><?php echo $patient['address']; ?></textarea>
        </div>

        <!-- Display Uploaded TRF Form if exists -->
        <div class="form-group col-md-12" id="image-preview">
            <?php
            if (isset($patient['trf_form']) && !empty($patient['trf_form'])) {
                // Assuming 'trf_form' stores the image file path
                echo '<img src="' . $patient['trf_form'] . '" alt="TRF Form" style="max-width: 300px; max-height: 200px;"/>';
                echo"<br> <br>";
                echo '<button type="button" class="btn btn-danger" id="delete-image-btn" onclick="deleteImage()">Delete Image</button>';
            } else {
                // If no file is uploaded, show the file upload input
                echo '<label for="trf_form">Upload TRF Form</label>';
                echo '<input type="file" class="form-control" id="trf_form" name="trf_form" required>';
            }
            ?>
        </div>
    
    

   
        <!-- Assign Branch -->
        <div class="form-group col-md-6 mb-3">
            <label for="city">Assign Branch</label>
            <select class="form-control" id="city" name="branch" required>
                <?php
                // Fetch branches for dropdowns
                $query = "SELECT branch_id, branch_area FROM taiyo_branches WHERE act = 1 ORDER BY id";
                $result = mysqli_query($conn, $query);

                // First display the selected branch
                $selectedBranchDisplayed = false;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['branch_id'] == $patient['branch'] && !$selectedBranchDisplayed) {
                        echo '<option value="' . htmlspecialchars($row['branch_id']) . '" selected>' . htmlspecialchars($row['branch_area']) . '</option>';
                        $selectedBranchDisplayed = true;
                    }
                }

                // Reset result pointer and fetch remaining branches
                mysqli_data_seek($result, 0);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['branch_id'] != $patient['branch']) {
                        echo '<option value="' . htmlspecialchars($row['branch_id']) . '">' . htmlspecialchars($row['branch_area']) . '</option>';
                    }
                }

                // Optional: Add the placeholder if no branch is selected
                if (!$selectedBranchDisplayed) {
                    echo '<option value="" selected>Select Branch</option>';
                }
                ?>
            </select>
        </div>
        
        </div>


    <!-- Submit Button -->
    <input type="submit" class="btn btn-primary" value="Submit Booking">
</form>

<!-- Loader Overlay -->
<div id="overlay" class="overlay">
    <div class="loader"></div>
</div>

<script>
    // Function to display loader and darken the screen
    function showLoader() {
        document.getElementById('overlay').style.display = 'flex';
    }

    // Toggle the address field visibility based on the collection type
    function toggleAddressField() {
        const collectionType = document.getElementById('collection_type').value;
        const addressField = document.getElementById('address-field');
        if (collectionType === 'HomePickup') {
            addressField.style.display = 'block';
        } else {
            addressField.style.display = 'none';
        }
    }

    // Function to delete the uploaded image (optional)
    function deleteImage() {
        if (confirm('Are you sure you want to delete this image?')) {
            // Perform AJAX request to delete the image from the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_image", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("patient_id=<?php echo $patient['patient_id']; ?>");

            // Optionally, clear the image preview and show the file input for new upload
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('image-preview').innerHTML = '<label for="trf_form">Upload TRF Form</label><input type="file" class="form-control" id="trf_form" name="trf_form" required>';
                } else {
                    alert('Error deleting the image.');
                }
            };
        }
    }

    // Call toggleAddressField on page load to ensure the correct visibility of the address field
    window.onload = function() {
        toggleAddressField();
    };
</script>

<style>
    /* Loader Overlay */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loader {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 2s linear infinite;
    }

    /* Animation for the loader */
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>

    <?php include('footerjs.php'); ?>
</body>

</html>

<?php
} else {
    echo "<meta http-equiv='refresh' content='0;url=invalid.php?ms_id=jn63eJ' />";
}
?>
