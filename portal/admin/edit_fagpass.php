<?php
include('offline.php');

if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];

    // Fetch the agent's ID from the URL
    if (isset($_GET['adm_id'])) {
        $fagnt_id = $_GET['adm_id'];
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate password criteria
        if ($new_password !== $confirm_password) {
            echo "<script>alert('Passwords do not match.');</script>";
        } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $new_password)) {
            echo "<script>alert('Password must be at least 8 characters long, contain letters, numbers, and at least one special character.');</script>";
        } else {
            // Hash the new password before storing it
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $update_query = "UPDATE taiyo_fagent SET password='$hashed_password' WHERE access_id='$fagnt_id'";

            if (mysqli_query($conn, $update_query)) {
                echo "<script>alert('Password updated successfully!'); window.location.href='manage_field_agents.php';</script>";
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }
        }
    }

    include('doctype.php');
?>

<head>
    <title>Change Password</title>
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
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="process_edit_fagpass?adm_id=<?php echo $fagnt_id; ?>">
    <div class="form-group">
        <label for="new_password">New Password</label>
        <input type="password" class="form-control" id="new_password" name="new_password" required>
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Password</button>
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