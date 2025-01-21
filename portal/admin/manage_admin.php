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
                                <h4 class="card-title">Manage Admins</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="emp_data" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>S.No</strong></th>
                                                <th><strong>Admin Id</strong></th>
                                                <th><strong>Admin Name</strong></th>
                                                <th><strong>Email</strong></th>
                                                <th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch all active admins with access_type 'ADMIN'
                                            $emp_fetch = "SELECT * FROM taiyo_admin WHERE access_type='ADMIN' AND act='1' ORDER BY id DESC";
                                            $fetch_equery = mysqli_query($conn, $emp_fetch);
                                            $sno = 1; // Serial number for listing

                                            // Loop through each admin and display their details
                                            while ($row2 = mysqli_fetch_array($fetch_equery)) {
                                                $adm_id = $row2["access_id"];
                                                $adm_name = $row2["name"];
                                                $adm_email = $row2["email"];
                                                $adm_phone = $row2["phone"];

                                                echo "<tr>
                                                    <td><strong>$sno</strong></td>
                                                    <td>$adm_id</td>
                                                    <td>$adm_name</td>
                                                    <td>$adm_email</td>
                                                    <td>
                                                        <div class=\"dropdown\">
                                                            <button type=\"button\" class=\"btn btn-success light sharp\" data-toggle=\"dropdown\">
                                                                <svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" version=\"1.1\">
                                                                    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                                                                        <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"></rect>
                                                                        <circle fill=\"#000000\" cx=\"5\" cy=\"12\" r=\"2\"></circle>
                                                                        <circle fill=\"#000000\" cx=\"12\" cy=\"12\" r=\"2\"></circle>
                                                                        <circle fill=\"#000000\" cx=\"19\" cy=\"12\" r=\"2\"></circle>
                                                                    </g>
                                                                </svg>
                                                            </button>
                                                            <div class=\"dropdown-menu\">
                                                                <a class=\"dropdown-item\" href=\"edit_admpass.php?adm_id=$adm_id\">Change Password</a>
                                                                <a class=\"dropdown-item\" href=\"delete_admin.php?adm_id=$adm_id\" onclick=\"return confirm('Are you sure want to delete?');\">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>";
                                                $sno++; // Increment serial number
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <script>
                                        $(document).ready(function() {
                                            $('#emp_data').DataTable(); // Initialize DataTable for the admin list
                                        });
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