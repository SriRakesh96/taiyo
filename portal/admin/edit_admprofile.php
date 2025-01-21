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
        
        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <!-- Form to add a new admin -->
                                    <form action="update_admpro.php" method="POST">
                                        <div class="form-row">
                                            
                                            <?php 
                                            // Fetch admin details using the access_id
                                            $access_fetch = "SELECT * FROM taiyo_admin WHERE access_id ='$access_id' AND act='1'"; 
                                            $fetch_equery = mysqli_query($conn, $access_fetch);  

                                            // Initialize variables for booking details
                                            while($row2 = mysqli_fetch_array($fetch_equery)) {    
                                                $name = $row2['name'];
                                                $email = $row2['email'];
                                                $phone = $row2['phone'];
                                            }
                                            ?>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $name; ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $email; ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" value="<?php echo $phone; ?>" required>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" id="submit" name="add_employee" value="Update Admin" required>
                                    </form>

                                    <!-- JavaScript for form validation -->
                                    <script type="text/javascript">
                                        // Disable the submit button when the page is about to unload
                                        $(window).on('beforeunload', function () {
                                            $("input[type=submit], input[type=button]").prop("disabled", "disabled");
                                        });

                                        // Live validation for name
                                        var qname = new LiveValidation('name', { validMessage: 'validated', wait: 100 });
                                        qname.add(Validate.Presence, { failureMessage: "Name cannot be blank!" });
                                        qname .add(Validate.Length, { minimum: 3 });
                                        qname.add(Validate.Length, { maximum: 40 });
                                        qname.add(Validate.Format, { pattern: /^[a-z ,.'-]+$/i });

                                        // Live validation for phone
                                        var phone = new LiveValidation('phone', { validMessage: 'validated', wait: 100 });
                                        phone.add(Validate.Presence, { failureMessage: "Phone Number cannot be blank!" });
                                        phone.add(Validate.Length, { minimum: 10 });
                                        phone.add(Validate.Length, { maximum: 10 });
                                        phone.add(Validate.Format, { pattern: /^[0-9]{6,16}$/i });

                                        // Live validation for email
                                        var email = new LiveValidation('email', { validMessage: 'validated', wait: 100 });
                                        email.add(Validate.Presence, { failureMessage: "Email cannot be blank!" });
                                        email.add(Validate.Length, { minimum: 6 });
                                        email.add(Validate.Length, { maximum: 50 });
                                        email.add(Validate.Format, { pattern: /^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$/ });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content body end -->

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