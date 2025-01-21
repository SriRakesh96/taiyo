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

    // Get inventory details from the URL
    $id = $_GET['id'];
    $item_name = $_GET['item_name'];
    $quantity = $_GET['quantity'];
    $damage_status = $_GET['damage_status'];
    $damage_image = $_GET['damage_image'];

    include('doctype.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Inventory</title>
    <?php include('head.php'); ?>
</head>
<body>
    <div id="main-wrapper">
        <?php include('header.php'); ?>
        <?php include('home_sidebar.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Inventory</h4>
                            </div>
                            <div class="card-body">
                                <form action="update_inventory_action" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                                    <div class="form-group">
                                        <label for="item_name">Item Name</label>
                                        <input type="text" class="form-control" name="item_name" value="<?php echo $item_name; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" name="quantity" value="<?php echo $quantity; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="damage_status">Damage Status</label>
                                        <select class="form-control" name="damage_status" onchange="toggleDamageImage(this.value)" required>
                                            <option value="No" <?php echo $damage_status === 'No' ? 'selected' : ''; ?>>No</option>
                                            <option value="Yes" <?php echo $damage_status === 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="damage_image_group" style="display: <?php echo $damage_status === 'Yes' ? 'block' : 'none'; ?>;">
                                        <label for="damage_image">Damage Image</label>
                                        <?php if (!empty($damage_image)) { ?>
                                            <img src="<?php echo $damage_image; ?>" alt="Damage Image" style="display:block; max-width:200px; margin-bottom:10px;">
                                        <?php } ?>
                                        <input type="file" class="form-control" name="damage_image" accept="image/*">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>

    <?php include('footerjs.php'); ?>
    <script>
        function toggleDamageImage(value) {
            const damageImageGroup = document.getElementById('damage_image_group');
            if (value === 'Yes') {
                damageImageGroup.style.display = 'block';
            } else {
                damageImageGroup.style.display = 'none';
            }
        }
    </script>
</body>
</html>

<?php
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
