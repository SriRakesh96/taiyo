<?php

include('offline.php');


if (!empty($_COOKIE['eng_email']) && !empty($_COOKIE['eng_password'])) {
    $cookie_email = $_COOKIE['eng_email'];
    $cookie_password = $_COOKIE['eng_password'];
    

    $user_data = "SELECT * FROM sptvsp_engineer WHERE email='$cookie_email'";
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
   <?php include('head.php'); ?>
   <link href="calender.css" rel="stylesheet" type="text/css">
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
   <!--**********************************
      Main wrapper start
      ***********************************-->
   <div id="main-wrapper">
      <?php include('header.php'); ?>
      <?php include('home_sidebar.php'); ?>
      <!-- Include Google Maps JavaScript API -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpJ7BHOPCCo67OcKIJZ4MaOwd9T2bP-Uw"></script>
      <?php
         $ye=$_GET['year'];
         $mn=$_GET['month'];
         
         $day=$_GET['id'];
         $dt="$ye-$mn-$day";
         
         
         echo $dt;
         ?>
      <!--**********************************
         Content body start
         ***********************************-->
      <div class="content-body">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <h4 class="card-title">Manage Bookings</h4>
                  <div class="row">
                     <?php 
                        $emp_fetch = "SELECT * FROM sptvsp_bookings WHERE booking_date='$dt' AND act='1' ORDER BY id DESC"; 
                        $fetch_equery = mysqli_query($conn, $emp_fetch);  
                        
                        // Initialize an array to store booking data for JavaScript
                        $booking_data = [];
                        
                        while($row2 = mysqli_fetch_array($fetch_equery)) {    
                            $booking_id = $row2['booking_id'];
                            $cus_name = $row2['name'];
                             $cus_phone = $row2['phone'];
                            $cus_email = $row2['email'];
                            $cus_address = $row2['address'];
                            $latitude = $row2['lati'];
                            $longitude = $row2['longi'];
                        
                        ?>
                     <div class="col-md-6">
                        <div class="card mb-4 text-center">
                           <div class="card-header">
                              <h5 class="card-title">Booking ID: <?php echo $booking_id; ?></h5>
                           </div>
                           <div class="card-body">
                              <p><strong>Customer Name:</strong> <?php echo $cus_name; ?></p>
                              <p><strong>Customer Email:</strong> <?php echo $cus_email; ?></p>
                              <p><strong>Customer Phone:</strong> <?php echo $cus_phone; ?></p>
                              <p><strong>Customer Address:</strong> <?php echo $cus_address; ?></p>
                              <!-- Map Container -->
                              <div id="map"><iframe
                                 style="border:0"
                                 loading="lazy"
                                 allowfullscreen
                                 referrerpolicy="no-referrer-when-downgrade"
                                 src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCpJ7BHOPCCo67OcKIJZ4MaOwd9T2bP-Uw&q=<?php echo $latitude; ?>,<?php echo $longitude; ?>">
                                 </iframe>
                              </div>
                           </div>
                           <div class="card-footer">

   <a href="view_more?bkng_id=<?php echo $booking_id; ?>" class="btn btn-primary" style="display: block;margin: 0 auto;">View More</a>


                            
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Pass PHP data to JavaScript -->
      <script>
         var bookings = <?php echo json_encode($booking_data); ?>;
         
         function initAllMaps() {
             bookings.forEach(function(booking) {
                 var location = { lat: parseFloat(booking.latitude), lng: parseFloat(booking.longitude) };
                 var map = new google.maps.Map(document.getElementById("map-" + booking.booking_id), {
                     zoom: 14,
                     center: location
                 });
                 new google.maps.Marker({
                     position: location,
                     map: map,
                     title: "Booking ID: " + booking.booking_id
                 });
             });
         }
         
         // Initialize maps after the page fully loads
         window.onload = initAllMaps;
      </script>
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