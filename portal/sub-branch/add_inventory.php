<?php
include('offline.php');

if (!empty($_COOKIE['eng_email']) && !empty($_COOKIE['eng_password'])) {
    $cookie_email = $_COOKIE['eng_email'];
    $cookie_password = $_COOKIE['eng_password'];

    $user_data = "SELECT * FROM taiyo_branchlogins WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $name = $row6['name'];
        $branch=$row6['branch'];
    }

    // Fetch inventory items
    $inventory_query = "SELECT id, item_name FROM inventory_items";
    $inventory_result = mysqli_query($conn, $inventory_query);

    include('doctype.php');
?>
<head>
    <title><?php echo $type; ?></title>
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
                                <h4 class="card-title">Add Inventory</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="inventory_submit" method="POST" enctype="multipart/form-data">
      <div class="form-row">
    <!-- Item Type Dropdown -->
    <div class="form-group col-md-6">
        <label for="item_type">Select Item</label>
        <select class="form-control" id="item_type" name="item_type" onchange="toggleOtherField()" required>
            <option value="">Select Item</option>
            <!-- Dynamically generated items -->
            <?php
            if (mysqli_num_rows($inventory_result) > 0) {
                while ($row = mysqli_fetch_assoc($inventory_result)) {
                    echo "<option value='" . $row['item_name'] . "'>" . $row['item_name'] . "</option>";
                }
            }
            ?>
            <option value="Other">Other</option>
        </select>
    </div>

    <!-- Other Item Name Field -->
    <div class="form-group col-md-6" id="other-item-field" style="display: none;">
        <label for="other_item_name">Enter Item Name</label>
        <input type="text" class="form-control" id="other_item_name" name="other_item_name" placeholder="Enter Item Name">
    </div>
                                            <!-- Quantity -->
                                            <div class="form-group col-md-6">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                            </div>

                                            <!-- Received On -->
                                            <div class="form-group col-md-6">
                                                <label for="received_on">Received On</label>
                                                <input type="date" class="form-control" id="received_on" name="received_on" required>
                                            </div>

                                            <!-- Received By -->
                                            <div class="form-group col-md-6">
                                                <label for="received_by">Received By</label>
                                                <input type="text" class="form-control" id="received_by" name="received_by" placeholder="Enter Receiver's Name" required>
                                            </div>

                                            <!-- Damage Status -->
                                            <div class="form-group col-md-6">
                                                <label for="damage">Is there any damage?</label>
                                                <select class="form-control" id="damage" name="damage" onchange="togglePhotoUpload()" required>
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>

                                            <!-- Upload Photo (Hidden initially) -->
                                            <div class="form-group col-md-6" id="photo-upload" style="display: none;">
                                                <label for="damage_photo">Upload Photo of Damage</label>
                                                <input type="file" class="form-control" id="damage_photo" name="damage_photo" accept="image/*">
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

        <?php include('footer.php'); ?>
    </div>

    <?php include('footerjs.php'); ?>

   <script>
    // Show or hide the "Other Item Name" field based on the selected item
    function toggleOtherField() {
        const itemType = document.getElementById('item_type').value;
        const otherField = document.getElementById('other-item-field');
        const otherInput = document.getElementById('other_item_name');

        if (itemType === 'Other') {
            otherField.style.display = 'block';
            otherInput.setAttribute('required', 'required');
        } else {
            otherField.style.display = 'none';
            otherInput.removeAttribute('required');
        }
    }

    // Show or hide the "Upload Photo of Damage" field based on damage selection
    function togglePhotoUpload() {
        const damageStatus = document.getElementById('damage').value;
        const photoUpload = document.getElementById('photo-upload');
        const photoInput = document.getElementById('damage_photo');

        if (damageStatus === 'Yes') {
            photoUpload.style.display = 'block';
            photoInput.setAttribute('required', 'required');
        } else {
            photoUpload.style.display = 'none';
            photoInput.removeAttribute('required');
        }
    }
</script>


    <script type="text/javascript">
        $(window).on('beforeunload', function () {
            $("input[type=submit], input[type=button]").prop("disabled", "disabled");
        });
    </script>
</body>
</html>
<?php
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
