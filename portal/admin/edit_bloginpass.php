<?php
// Include the offline.php file for database connection and session management
include "offline.php";

// Check if the admin email and password cookies are set
if (!empty($_COOKIE["adm_email"]) && !empty($_COOKIE["adm_password"])) {

    // Retrieve cookie values
    $cookie_email = $_COOKIE["adm_email"];
    $cookie_password = $_COOKIE["adm_password"];

    // Fetch user data based on the cookie email
    $user_data = "SELECT * FROM taiyo_admin WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    // Initialize variables for user details
    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6["access_type"];
        $access_id = $row6["access_id"];
        $name = $row6["name"];
    }

    // Include the document type and head section
    include "doctype.php";
?>

<head>
    <title><?php echo $type; ?></title>
    <?php include "head.php"; ?>
</head>

<body>
    <!-- Preloader start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!-- Preloader end -->
    
    <!-- Main wrapper start -->
    <div id="main-wrapper">
        <?php include "header.php"; ?>
        <?php include "home_sidebar.php"; ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                
                <!-- Row for editing admin password -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Branch Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="edi_blogin_passpro" method="POST">

                                        <div class="form-row">
                                            <?php  
                                                // Fetch admin details based on the provided admin ID
                                                    $branch_id = $_GET['branch_id'];
                                                $adm_fetch = "SELECT * FROM taiyo_branchlogins WHERE access_id='$branch_id' AND act='1'"; 
                                                $fetch_equery = mysqli_query($conn, $adm_fetch);  
                                           
                                                // Loop through the fetched admin data
                                                while ($row2 = mysqli_fetch_array($fetch_equery)) {    
                                                    $branch_id = $row2['access_id'];
                                                    $name = $row2['name'];
                                                    $email = $row2['email'];
                                                    $phone = $row2['phone'];
                                                }
                                            ?>
                                            
                                            <!-- Hidden input for admin ID -->
                                            <input type="hidden" class="form-control" name="branch_id" value="<?php echo $branch_id; ?>">

                                            <!-- Display admin details in read-only fields -->
                                       
                                     
                                            <!-- Input fields for new password and confirmation -->
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" id="cnf_password" name="cnfpassword" placeholder="Confirm New Password">
                                            </div>

                                            <!-- Submit button -->
                                            <div class="form-group col-md-12">
                                                <input type="submit" class="btn btn-primary" id="submit" value="Save Password">
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- JavaScript to disable submit button on page unload -->
                        <script type="text/javascript">
                            $(window).on('beforeunload', function () {
                                $("input[type=submit], input[type=button]").prop("disabled", "disabled");
                            });
                        </script>

                        <!-- JavaScript for password validation -->
                        <script type="text/javascript">
                            var password = new LiveValidation('password', { validMessage: 'validated', wait: 100 });
                            password.add(Validate.Presence, { failureMessage: "Password cannot be Blank!" });
                            password.add(Validate.Length, { minimum: 6 });
                            password.add(Validate.Length, { maximum: 20 });
                            password.add(Validate.Format, { pattern: /^(?=.*\d).{6,20}$/ });

                            var cnf_password = new LiveValidation('cnf_password', { validMessage: 'validated', wait: 100 });
                            cnf_password.add(Validate.Presence, { failureMessage: "Confirm Password cannot be Blank!" });
                            cnf_password.add(Validate.Length, { minimum: 6 });
                            cnf_password.add(Validate.Length, { maximum: 20 });
                            cnf_password.add(Validate.Format, { pattern: /^(?=.*\d).{6,20}$/ });
                            cnf_password.add(Validate.Confirmation, { match: 'password' });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include "footer.php"; ?>
    </div>
    <!-- Main wrapper end -->

    <?php include "footerjs.php"; ?>
</body>

</html>

<?php
} else {
    // Redirect to invalid page if cookies are not set
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>