<?php

include('offline.php');


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

// Fetch locations for dropdowns
$query = "SELECT * FROM taiyo_branches WHERE act = 1 ORDER BY id";
$result = mysqli_query($conn, $query);



    include('doctype.php');
?>

<head>


<title><?php echo $type; ?> </title>

<?php

include('head.php');


?>


</head>

<body>


   <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
	
	

<?php

include('header.php');


?>
<?php

include('home_sidebar.php');


?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				
                <!-- row -->
                <div class="row">
                <div class="col-lg-12">
               
                       <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Booking</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                   

<style>
    .large-radio {
        transform: scale(1.5); /* Makes the radio buttons bigger */
        margin-right: 10px; /* Adds space between the radio button and label */
    }

    .form-group label {
        font-size: 16px; /* Increase the size of the label text */
    }
</style>


    


<form action="book_pro" method="POST" enctype="multipart/form-data" onsubmit="showLoader()">
    <div class="form-row">
        <!-- Collected Items (Radio Buttons) -->
        <div class="form-group col-lg-6 col-md-6">
            <label for="collected_items">Collected Items</label><br>
            <input type="radio" id="blood" name="collected_items" value="Blood" required class="large-radio">
            <label for="blood">Blood</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" id="urine" name="collected_items" value="Urine" required class="large-radio">
            <label for="urine">Urine</label>&nbsp;&nbsp;&nbsp;

            <input type="radio" id="both" name="collected_items" value="Both(Urine+Blood)" required class="large-radio">
            <label for="both">Both</label>
        </div>

        <!-- Collection Type -->
        <div class="form-group col-md-6">
            <label for="collection_type">Collection Type</label>
            <select class="form-control" id="collection_type" name="collection_type" onchange="toggleAddressField()" required>
                <option value="">Select</option>
                <option value="Lab">Lab</option>
                <option value="HomePickup">Home Pickup</option>
            </select>
        </div>

        <!-- Address (Hidden initially) -->
        <div class="form-group col-md-12" id="address-field" style="display: none;">
            <label for="address">Pickup Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Pickup Address"></textarea>
        </div>

           <!-- Upload TRF Form -->
<div class="form-group col-md-12">
    <label for="trf_form">Upload TRF Form</label>
    <input 
        type="file" 
        class="form-control" 
        id="trf_form" 
        name="trf_form" 
        accept="image/*" 
        required>
</div>


<div class="form-group col-md-6 mb-3">
    <label for="branch">Assign Branch</label>
    <select class="form-control" id="branch" name="branch" required>
        <option value="">Select Branch</option>
        <?php
        $citiesSeen = []; // To avoid duplicate branch areas
        while ($row = mysqli_fetch_assoc($result)) {
            if (!in_array($row['branch_area'], $citiesSeen)) {
                echo '<option value="' . htmlspecialchars($row['branch_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($row['branch_area'], ENT_QUOTES, 'UTF-8') . '</option>';
               
            }
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

<!-- Optional: Add custom CSS -->
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

<!-- Optional: JavaScript to Show Loader -->
<script>
    function showLoader() {
        document.getElementById('overlay').style.display = 'flex';
    }
</script>


<script>
    // JavaScript to toggle address field visibility
    function toggleAddressField() {
        const collectionType = document.getElementById('collection_type').value;
        const addressField = document.getElementById('address-field');
        if (collectionType === 'HomePickup') {
            addressField.style.display = 'block';
            document.getElementById('address').setAttribute('required', 'required');
        } else {
            addressField.style.display = 'none';
            document.getElementById('address').removeAttribute('required');
        }
    }
</script>

                                    
                                </div>
                            </div>
                        </div>

            
                </div>
            </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->




        <?php

include('footer.php');


?>


    </div>
    <!--**********************************
        Main wrapper end
    ******-->
	
<?php

include('footerjs.php');


?>

</body>

</html>
    
<?php
}
   
else
{
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
     
?>
