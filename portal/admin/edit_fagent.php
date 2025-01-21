<?php
include('offline.php');

if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];

    // Fetch the agent's details based on the ID passed in the URL
    if (isset($_GET['adm_id'])) {
        $fagnt_id = $_GET['adm_id'];
        $agent_query = "SELECT * FROM taiyo_fagent WHERE access_id='$fagnt_id'";
        $agent_result = mysqli_query($conn, $agent_query);
        $agent_data = mysqli_fetch_assoc($agent_result);
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Prepare the update query for name, email, and phone only
        $update_query = "UPDATE taiyo_fagent SET name='$name', email='$email', phone='$phone' WHERE access_id='$fagnt_id'";

        // Execute the update query
        if (mysqli_query($conn, $update_query)) {
            echo "<script>alert('Field agent updated successfully!'); window.location.href='manage_field_agents.php';</script>";
        } else {
            echo "<script>alert('Error updating field agent.');</script>";
        }
    }

    include('doctype.php');
?>

<head>
    <title>Edit Field Agent</title>
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
                                <h4 class="card-title">Edit Field Agent</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="process_edit_fagent">
    <input type="hidden" name="adm_id" value="<?php echo $agent_data['access_id']; ?>">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($agent_data['name']); ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($agent_data['email']); ?>" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($agent_data['phone']); ?>" required>
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
</body>

</html>

<?php
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>