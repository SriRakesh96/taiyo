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
                <!-- Row for adding zones -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Zones</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <!-- Form for adding a new zone -->
                                    <form action="add_zonepro" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Enter Zone</label>
                                                <input type="text" class="form-control" id="name" name="zone" placeholder="Enter Zone Name" required>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" id="submit" name="add_employee" value="Add Zone" required>
                                    </form>

                                    <!-- Disable submit button on page unload -->
                                    <script type="text/javascript">
                                        $(window).on('beforeunload', function () {
                                            $("input[type=submit], input[type=button]").prop("disabled", "disabled");
                                        });
                                    </script>

                                    <!-- JavaScript for phone validation (if applicable) -->
                                    <script type="text/javascript">
                                        var phone = new LiveValidation('phone', { validMessage: 'validated', wait: 100 });
                                        phone.add(Validate.Presence, { failureMessage: "Phone Number cannot be Blank!" });
                                        phone.add(Validate.Length, { minimum: 10 });
                                        phone.add(Validate.Length, { maximum: 10 });
                                        phone.add(Validate.Format, { pattern: /^[0-9]{6,16}$/i });
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