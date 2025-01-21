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
    
    $br_id=$_GET['access_id'];
      
 // Define the directory path for the photos
    $directory_path = "../damaged_items/$br_id/";

    // Check if the directory exists
    if (is_dir($directory_path)) {
        // Fetch all image files from the directory
        $images = glob($directory_path . "*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);


        if (!empty($images)) {
            // Sort the images by modification time (latest first)
            usort($images, function ($a, $b) {
                return filemtime($b) - filemtime($a); // Compare modification times (descending)
            });
        }

        include('doctype.php');
        ?>
        <head>
            <title>All Damage Photos</title>
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
                                        <h4 class="card-title">All Damage Photos</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                                                                       <?php
                                            if (!empty($images)) {
                                                // Loop through each image and display it with its date
                                                foreach ($images as $image) {
                                                    $file_date = date("F d, Y", filemtime($image)); // Format: "Month Day, Year"
                                                    echo "<div class='col-md-4 mb-4'>
                                                            <div class='photo-box'>
                                                                <p class='text-center mb-2'><strong>$file_date</strong></p>
                                                                <img src='$image' alt='Photo' class='img-fluid' style='width: 100%; object-fit: cover;'>
                                                            </div>
                                                          </div>";
                                                }
                                            } else {
                                                // No images found
                                                echo "<div class='col-12'>
                                                        <p class='text-center'>No photos found in directory.</p>
                                                      </div>";
                                            }
                                            ?>

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
        // Directory does not exist
        echo "<p class='text-center'>No directory found for Access ID: $access_id</p>";
    }
    
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
