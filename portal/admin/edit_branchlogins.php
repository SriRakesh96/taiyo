<?php
// Include the offline.php file for database connection and session management
include('offline.php');

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

    // Check if access_id is set in the URL
    if (isset($_GET['branch_id'])) {
        $branch_id = $_GET['branch_id']; // Get access ID from the URL

        // Fetch Branch Login Details based on the provided access ID
        $access_fetch = "SELECT * FROM taiyo_branchlogins WHERE access_id='$branch_id' AND act='1'"; 
        $fetch_equery = mysqli_query($conn, $access_fetch);  

        // Initialize variables for the form
        $branch_name = '';
        $branch_email = '';
        $branch_phone = '';

        // Loop through the fetched admin data
        while ($row2 = mysqli_fetch_array($fetch_equery)) {    
            $branch_name = $row2['name'];
            $branch_email = $row2['email'];
            $branch_phone = $row2['phone'];
        }

        // Include the document type and head section
        include('doctype.php');
    } else {
        // Redirect to an error page if access_id is not set
        echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=access_id_missing\" />";
        exit; // Stop further processing
    }
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

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Branch Login</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <!-- Form for editing a branch login -->
                                    <form action="edit_branchlpro" method="POST">
                                        <!-- Hidden input for access ID -->
                                        <input type="hidden" class="form-control" name="access_id" value="<?php echo $branch_id; ?>">

                                        <div class="form-row">
                                            <!-- Name Input -->
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id ="name" name="name" placeholder="Enter Name" value="<?php echo htmlspecialchars($branch_name); ?>" required>
                                            </div>

                                            <!-- Email Input -->
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($branch_email); ?>" required>
                                            </div>

                                            <!-- Phone Input -->
                                            <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" value="<?php echo htmlspecialchars($branch_phone); ?>" required>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <input type="submit" class="btn btn-primary" id="submit" name="update_branch" value="Update Branch Login" required>
                                    </form>

                                    <!-- Disable submit button on page unload -->
                                    <script type="text/javascript">
                                        $(window).on('beforeunload', function () {
                                            $("input[type=submit], input[type=button]").prop("disabled", "disabled");
                                        });
                                    </script>

                                    <!-- Validation for form fields -->
                                    <script type="text/javascript">
                                        var qname = new LiveValidation('name', { validMessage: 'validated', wait: 100 });
                                        qname.add(Validate.Presence, { failureMessage: "Name cannot be Blank!" });
                                        qname.add(Validate.Length, { minimum: 3 });
                                        qname.add(Validate.Length, { maximum: 40 });
                                        qname.add(Validate.Format, { pattern: /^[a-z ,.'-]+$/i });

                                        var phone = new LiveValidation('phone', { validMessage: 'validated', wait: 100 });
                                        phone.add(Validate.Presence, { failureMessage: "Phone Number cannot be Blank!" });
                                        phone.add(Validate.Length, { minimum: 10 });
                                        phone.add(Validate.Length, { maximum: 10 });
                                        phone.add(Validate.Format, { pattern: /^[0-9]{6,16}$/i });

                                        var email = new LiveValidation('email', { validMessage: 'validated', wait: 100 });
                                        email.add(Validate.Presence, { failureMessage: "Email cannot be Blank!" });
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