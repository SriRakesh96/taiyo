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

    // Fetch locations for dropdowns
    $query = "SELECT * FROM taiyo_branches WHERE act = 1 ORDER BY id";
    $result = mysqli_query($conn, $query);

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

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Branch Login</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <!-- Form for adding a new branch login -->
                                    <form action="add_branchlpro" method="POST">
                                        <div class="form-row">
                                            <!-- Branch Dropdown -->
                                            <div class="form-group col-md-6 mb-3">
                                                <label for="city">Branch</label>
                                                <select class="form-control" id="city" name="branch" required>
                                                    <option value="">Select Branch</option>
                                                    <?php
                                                    // Reset result pointer to fetch branches separately
                                                    mysqli_data_seek($result, 0);
                                                    $citiesSeen = [];
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        // Ensure unique branch areas are displayed
                                                        if (!in_array($row['area'], $citiesSeen)) {
                                                            echo '<option value="' . htmlspecialchars($row['branch_id']) . '">' . htmlspecialchars($row['branch_area']) . '</option>';
                                                          
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Name Input -->
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                            </div>

                                            <!-- Email Input -->
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                            </div>

                                            <!-- Phone Input -->
                                            <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required>
                                            </div>

                                            <!-- Password Input -->
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                            </div>

                                            <!-- Confirm Password Input -->
                                            <div class="form-group col-md-6">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" id="cnf_password" name="cnfpassword" placeholder="Confirm Password" required>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <input type="submit" class="btn ```php
                                        btn-primary" id="submit" name="add_employee" value="Add Branch Login" required>
                                    </form>

                                    <!-- Disable submit button on page unload -->
                                    <script type="text/javascript">
                                        $(window).on('beforeunload', function () {
                                            $("input[type=submit], input[type=button]").prop("disabled", "disabled");
                                        });
                                    </script>

                                    <!-- Password validation -->
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