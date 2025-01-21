<?php

// Include database connection or required utility file
include('offline.php');

// Check if the admin's credentials are stored in cookies
if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];

    // Fetch admin user data from the database
    $user_data = "SELECT * FROM taiyo_admin WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    // Retrieve user details
    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $name = $row6['name'];
    }

    // Include the doctype and initial HTML structure
    include('doctype.php');
?>

<head>
    <title><?php echo $type; ?> </title>

    <?php
    // Include additional head elements
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
        // Include header and sidebar navigation
        include('header.php');
        include('home_sidebar.php');
        ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

                <!-- Table Section for Managing Branches -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Branches</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <!-- Branches Table -->
                                    <table id="emp_data" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>S.No</strong></th>
                                                <th><strong>Id</strong></th>
                                                <th><strong>Zone</strong></th>
                                                <th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch active zones from the database
                                            $loc_fetch = "SELECT * FROM taiyo_zones WHERE act='1' ORDER BY id DESC";
                                            $fetch_lquery = mysqli_query($conn, $loc_fetch);
                                            $sno = 1; // Initialize serial number

                                            // Loop through each zone record
                                            while ($row2 = mysqli_fetch_array($fetch_lquery)) {
                                                $zone_id = $row2['zone_id'];
                                                $zone = $row2['zone'];

                                                echo "<tr>
                                                        <td><strong>$sno</strong></td>
                                                        <td>$zone_id</td>
                                                        <td>$zone</td>
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
                                                                    <a class=\"dropdown-item\" href=\"edit_zone.php?adm_id=$zone_id\">Edit</a>
                                                                   
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>";

                                                $sno++; // Increment serial number
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <!-- Initialize DataTables -->
                                    <script>
                                        $(document).ready(function () {
                                            $('#emp_data').DataTable();
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

        <?php
        // Include footer
        include('footer.php');
        ?>

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <?php
    // Include footer scripts
    include('footerjs.php');
    ?>

</body>

</html>

<?php
} else {
    // Redirect to invalid page if cookies are not set
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
