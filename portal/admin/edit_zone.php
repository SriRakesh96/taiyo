<?php
// Include the offline.php file for database connection and session management
include('offline.php');


header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.


// Check if the admin email and password cookies are set
if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];

    // Fetch user data based on the cookie email
    $user_data = "SELECT * FROM taiyo_admin WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    // Initialize user details
    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $name = $row6['name'];
    }

    // Include the document type and head section
    include('doctype.php');
?>

<head>
    <title><?php echo $type; ?></title>
    <?php include('head.php'); ?>
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
        <?php include('header.php'); ?>
        <?php include('home_sidebar.php'); ?>
        
        <div class="content-body">
            <div class="container-fluid">
                <!-- Row for editing zones -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Zones</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <!-- Form for editing a zone -->
                                       <form action="edit_zonepro"  method="POST">
                                        <div class="form-row">
                                            <?php  
                                                // Fetch zone details based on the provided zone ID
                                                $zone_id = $_GET['adm_id']; 
                                                $adm_fetch = "SELECT * FROM taiyo_zones WHERE zone_id='$zone_id' AND act='1'"; 
                                                $fetch_equery = mysqli_query($conn, $adm_fetch);  
                                               
                                                    while ($row5 = mysqli_fetch_array($fetch_equery)) {    
                                                        $zone_id = $row5['zone_id'];
                                                        $zone_name = $row5['zone']; // Assign the zone value
                                                    }
                                              
                                            ?>
                                        
                                           
                                            <!-- Hidden input for zone ID -->
                                            <div class="form-group col-md-6">
                                                <label>Zone-id (CAN'T EDIT THIS)</label>
                                            <input type="text" class="form-control" name="zone_id" value="<?php echo $zone_id; ?>" readonly>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Enter Zone</label>
                                                <input type="text" class="form-control" id="name" name="zone" placeholder="Enter Zone Name" value="<?php echo $zone_name; ?>" required>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" id="submit" value="Edit Zone" >
                                    </form>

                                    <!-- Disable submit button on page unload -->
                                    <script type="text/javascript">
                                        $(window). on('beforeunload', function () {
                                            $("input[type=submit], input[type=button]").prop("disabled", "disabled");
                                        });
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

        <?php include('footer.php'); ?>
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?php include('footerjs.php'); ?>
</body>

</html>

<?php
} else {
    // Redirect to invalid page if cookies are not set
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?> 

