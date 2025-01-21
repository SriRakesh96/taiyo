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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Branches</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="emp_data" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>S.No</strong></th>
                                                <th><strong>Zone</strong></th>
                                                <th><strong>Branch</strong></th>
                                                <th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            // Fetch active branches from the database
                                            $loc_fetch = "SELECT * FROM taiyo_branches WHERE act='1' ORDER BY id DESC"; 
                                            $fetch_lquery = mysqli_query($conn, $loc_fetch);  
                                            $sno = 1; // Initialize serial number

                                            // Loop through the fetched branch data
                                            while ($row2 = mysqli_fetch_array($fetch_lquery)) {    
                                                $zone_id = $row2['zone_id'];
                                                $branch = $row2['branch_area'];
                                                $bid=$row2['branch_id'];

                                                // Fetch zone details based on the zone ID
                                                $loc_fetch2 = "SELECT * FROM taiyo_zones WHERE zone_id='$zone_id' ORDER BY id DESC"; 
                                                $fetch_lquery2 = mysqli_query($conn, $loc_fetch2);  
                                               

                                                // Loop through the fetched zone data
                                                while ($row3 = mysqli_fetch_array($fetch_lquery2)) {    
                                                    $zone = $row3['zone']; // Assign the zone value
                                                }

                                                // Display the branch details in a table row
                                                echo "<tr>
                                                    <td><strong>$sno</strong></td>
                                                    <td>$zone</td>
                                                    <td>$branch</td>
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
                                                                
                                                                     <a class=\"dropdown-item\" href=\"delete_branch?adm_id=$bid\">Delete</a>
                                                                   
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
                                        $(document).ready(function(){  
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


                                                            <!--<div class=\"dropdown-menu\">-->
                                                            <!--    <a class=\" dropdown-item\" href=\"edit_admprofile.php?adm_id=$fagnt_id\">Edit</a>-->
                                                            <!--    <a class=\"dropdown-item\" href=\"edit_admpass.php?adm_id=$fagnt_id\">Change Password</a>    -->
                                                            <!--    <a class=\"dropdown-item\" href=\"delete_admin.php?adm_id=$fagnt_id\" onclick=\"return confirm('Are you sure want to delete?');\">Delete</a>-->
                                                            <!--</div>-->