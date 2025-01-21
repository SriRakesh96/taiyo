<?php

include('offline.php');

if (!empty($_COOKIE['eng_email']) && !empty($_COOKIE['eng_password'])) {
    $cookie_email = $_COOKIE['eng_email'];
    $cookie_password = $_COOKIE['eng_password'];

    // Fetch user details
    $user_data = "SELECT * FROM taiyo_branchlogins WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $name = $row6['name'];
        $branch=$row6['branch'];
        }

    // Fetch inventory items
    $inventory_fetch = "SELECT * FROM inventory WHERE access_id='$access_id' ORDER BY id DESC";
    $inventory_query = mysqli_query($conn, $inventory_fetch);

    include('doctype.php');
?>

<head>
    <title>Manage Inventory</title>
    <?php include('head.php'); ?>
</head>
<body>
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

        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Inventory</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="inventory_data" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>S.No</strong></th>
                                                <th><strong>Item Name</strong></th>
                                                <th><strong>Quantity</strong></th>
                                                <th><strong>Received On</strong></th>
                                                <th><strong>Received By</strong></th>
                                                <th><strong>Damage Status</strong></th>
                                                <th><strong>Damage Image</strong></th>
                                                <th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sno = 1;
                                            while ($row = mysqli_fetch_array($inventory_query)) {
                                                $id = $row['id'];
                                                $item_name = $row['item_type'];
                                                $quantity = $row['quantity'];
                                                $received_on = $row['received_on'];
                                                $received_by = $row['received_by'];
                                                $damage_status = $row['damage'];
                                                $damage_image = $row['damage_photo']; // Assuming the column for the image is named 'damage_image'

                                                echo "<tr>
                                                    <td><strong>$sno</strong></td>
                                                    <td>$item_name</td>
                                                    <td>$quantity</td>
                                                    <td>$received_on</td>
                                                    <td>$received_by</td>
                                                    <td>$damage_status</td>";

                                            // Show image if damage status is "Yes"
if ($damage_status == 'Yes' && !empty($damage_image)) {
    echo "<td>
            <img src='$damage_image' alt='Damage Image' width='100' height='100'><br>
            <a href=\"show_all_photos.php?access_id=$access_id\" class=\"btn btn-primary mt-2\">Show All</a>
          </td>";
} else {
    echo "<td>No Image</td>";
}


                                                echo "<td>
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
            <a class=\"dropdown-item\" href=\"update_inventory?id=$id&item_name=$item_name&quantity=$quantity&damage_status=$damage_status&damage_image=$damage_image\">Update</a>
        </div>
    </div>
</td>
                                                </tr>";
                                                $sno++;   
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <script>  
                                        $(document).ready(function(){  
                                            $('#inventory_data').DataTable();  
                                        });  
                                    </script> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>

    <?php include('footerjs.php'); ?>
</body>
</html>

<?php
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
