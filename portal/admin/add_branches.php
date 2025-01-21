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
                 
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Branch</h4>
                            </div>
                   <div class="card-body">
    <div class="basic-form">
        <form action="add_branchpro" method="POST">
            <div class="form-row">
                <!-- Zone Dropdown -->
                <div class="form-group col-md-6">
                    <label>Zone</label>
                    <select class="form-control" id="zone" name="zone" required>
                        <option value="" disabled selected>Select Zone</option>
                        <?php
                        // Fetch zones from the database
                        $zone_query = "SELECT * FROM taiyo_zones";
                        $zone_result = mysqli_query($conn, $zone_query);
                        if ($zone_result && mysqli_num_rows($zone_result) > 0) {
                            while ($zone = mysqli_fetch_assoc($zone_result)) {
                                echo "<option value=\"{$zone['zone_id']}\">{$zone['zone']}</option>";
                            }
                        } else {
                            echo "<option value=\"\">No Zones Available</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <!-- Branch Name Input -->
                <div class="form-group col-md-6">
                    <label>Branch Name</label>
                    <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Enter Branch Name" required>
                </div>

              
           
            </div>
            
            <input type="submit" class="btn btn-primary" id="submit" name="add_branch" value="Add Branch" required>
        </form>

        <!-- JavaScript Validation -->
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
