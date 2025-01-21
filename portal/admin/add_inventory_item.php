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
    <title><?php echo $type; ?> | Add Inventory Item</title>
    <?php include('head.php'); ?>
</head>

<body>
    <!-- Preloader and Main Wrapper Start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <?php include('header.php'); ?>
        <?php include('home_sidebar.php'); ?>

        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Inventory Item</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="inventory_submit" method="POST">
                                        <div class="form-row">
                                            <!-- Item Name -->
                                            <div class="form-group col-md-6">
                                                <label for="item_name">Item Name</label>
                                                <input type="text" class="form-control" id="item_name" name="item_nam" placeholder="Enter Item Name" required>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <input type="submit" class="btn btn-primary" value="Submit Inventory">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content body end -->

        <?php include('footer.php'); ?>
    </div>
    <!-- Main wrapper end -->

    <?php include('footerjs.php'); ?>
</body>

</html>

<?php
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
