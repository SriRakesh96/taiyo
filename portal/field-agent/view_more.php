<?php
   include('offline.php');
   
   
   if (!empty($_COOKIE['fagn_email']) && !empty($_COOKIE['fagn_password'])) {
       $cookie_email = $_COOKIE['fagn_email'];
       $cookie_password = $_COOKIE['fagn_password'];
   
   
       $user_data = "SELECT * FROM sptvsp_fagent WHERE email='$cookie_email'";
       $user_conn = mysqli_query($conn, $user_data);
   
       while ($row6 = mysqli_fetch_assoc($user_conn)) {
           $type = $row6['access_type'];
           $access_id = $row6['access_id'];
           $ename = $row6['name'];
           
   
       }
   
   
   // Check if bkng_id is passed via GET
   if (isset($_GET['bkng_id'])) {
    $booking_id = mysqli_real_escape_string($conn, $_GET['bkng_id']);
   
    // Fetch booking details from the database
    $query = "SELECT * FROM sptvsp_bookings WHERE booking_id = '$booking_id'";
    $result = mysqli_query($conn, $query);
   
    if ($result && mysqli_num_rows($result) > 0) {
        $booking = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='alert alert-danger text-center'>No booking found for the given ID.</div>";
        exit;
    }
   } else {
    echo "<div class='alert alert-danger text-center'>No booking ID provided.</div>";
    exit;
   } 
       include('doctype.php');
   ?>
<head>
   <title><?php echo $type; ?> </title>
   <?php include('head.php'); ?>
   <link href="calender.css" rel="stylesheet" type="text/css">
   <style>
      .gallery img {
      max-width: 100px;
      margin: 5px;
      border-radius: 5px;
      border: 1px solid #ddd;
      }
      .gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      }
      .card {
      margin-bottom: 20px;
      }
   </style>
   <style>
      * {
      box-sizing: border-box;
      font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
      font-size: 16px;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      }
      body {
      background-color: #FFFFFF;
      margin: 0;
      }
      .navtop {
      background-color: #3b4656;
      height: 60px;
      width: 100%;
      border: 0;
      }
      .navtop div {
      display: flex;
      margin: 0 auto;
      width: 800px;
      height: 100%;
      }
      .navtop div h1, .navtop div a {
      display: inline-flex;
      align-items: center;
      }
      .navtop div h1 {
      flex: 1;
      font-size: 24px;
      padding: 0;
      margin: 0;
      color: #ebedee;
      font-weight: normal;
      }
      .navtop div a {
      padding: 0 20px;
      text-decoration: none;
      color: #c4c8cc;
      font-weight: bold;
      }
      .navtop div a i {
      padding: 2px 8px 0 0;
      }
      .navtop div a:hover {
      color: #ebedee;
      }
      .content {
      width: 800px;
      margin: 0 auto;
      }
      .content h2 {
      margin: 0;
      padding: 25px 0;
      font-size: 22px;
      border-bottom: 1px solid #ebebeb;
      color: #666666;
      }
   </style>
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
 
 
  <div id="main-wrapper">
      <?php include('header.php'); ?>
      <?php include('home_sidebar.php'); ?>
      <!-- Include Google Maps JavaScript API -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpJ7BHOPCCo67OcKIJZ4MaOwd9T2bP-Uw"></script>
   
   
   
      <!--**********************************
         Content body start
         ***********************************-->
      <div class="content-body">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <h4 class="card-title">View Booking Details</h4>
                  <div class="row">
                            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-striped">
                     <tr>
                        <th>Booking ID</th>
                        <td><?php echo htmlspecialchars($booking['booking_id']); ?></td>
                     </tr>
                     <tr>
                        <th>Customer Name</th>
                        <td><?php echo htmlspecialchars($booking['name']); ?></td>
                     </tr>
                     <tr>
                        <th>Customer Email</th>
                        <td><?php echo htmlspecialchars($booking['email']); ?></td>
                     </tr>
                     <tr>
                        <th>Customer Phone</th>
                        <td><?php echo htmlspecialchars($booking['phone']); ?></td>
                     </tr>
                     <tr>
                        <th>Customer Address</th>
                        <td><?php echo htmlspecialchars($booking['address']); ?></td>
                     </tr>
                     <tr>
                        <th>Booking Date</th>
                        <td><?php echo htmlspecialchars($booking['booking_date']); ?></td>
                     </tr>
                     <tr>
                        <th>Electricity Bill</th>
                        <td>
                           <a href="<?php echo htmlspecialchars($booking['electricity_bill']); ?>" target="_blank" class="btn btn-link">View Electricity Bill</a>
                        </td>
                     </tr>
                     <tr>
                        <th>Gallery Images</th>
                        <td>
                           <div class="gallery">
                              <?php 
                                 $gallery_images = json_decode($booking['gallery_images'], true);
                                 if ($gallery_images && is_array($gallery_images)) {
                                     foreach ($gallery_images as $image) {
                                         echo "<img src='".htmlspecialchars($image)."' alt='Gallery Image'>";
                                     }
                                 } else {
                                     echo "No images available.";
                                 }
                                 ?>
                           </div>
                        </td>
                     </tr>
                     
                     <tr>
                            <th>Location Map</th>
                            <td>
                                <div class="map-container">
                                    <iframe 
                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCpJ7BHOPCCo67OcKIJZ4MaOwd9T2bP-Uw&q=<?php echo htmlspecialchars($booking['lati']); ?>,<?php echo htmlspecialchars($booking['longi']); ?>" 
                                        allowfullscreen 
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </td>
                        </tr>
                    
                     <tr>
                        <th>Created At</th>
                        <td><?php echo htmlspecialchars($booking['created_at']); ?></td>
                     </tr>
                     <tr>
                        <th>Created By</th>
                        <td><?php echo htmlspecialchars($booking['created_by']); ?></td>
                     </tr>
                  </table>
               </div>
            </div>
                
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Pass PHP data to JavaScript -->
     
      <?php include('footer.php'); ?>
   </div>
   <!--**********************************
      Main wrapper end
      ******-->
   <?php include('footerjs.php'); ?>
</body>
</html>
<?php
   } else {
       // Redirect if the cookies are not set or invalid
       echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=jn63eJ\" />";
   }
   ?>