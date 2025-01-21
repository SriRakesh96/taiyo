<?php
   session_start();
   
   include('offline.php');
   
   
   if (!empty($_COOKIE['fagn_email']) && !empty($_COOKIE['fagn_password'])) {
       $cookie_email = $_COOKIE['fagn_email'];
       $cookie_password = $_COOKIE['fagn_password'];
   
   
       $user_data = "SELECT * FROM sptvsp_fagent WHERE email='$cookie_email'";
       $user_conn = mysqli_query($conn, $user_data);
   
       while ($row6 = mysqli_fetch_assoc($user_conn)) {
           $type = $row6['access_type'];
           $access_id = $row6['access_id'];
           $name = $row6['name'];
           
   
       }
   
  // Fetch locations for dropdowns
$query = "SELECT city, area FROM sptvsp_locations WHERE act = 1 ORDER BY city, area";
$result = mysqli_query($conn, $query);
 
       include('doctype.php');
   ?>
<head>
   <title><?php echo $type; ?> </title>
   <?php
      include('head.php');
      
      
      ?>
   <!-- jQuery CDN -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Include Google Maps JavaScript API -->
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpJ7BHOPCCo67OcKIJZ4MaOwd9T2bP-Uw"></script>
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
   <!-- Content body start -->
   <div class="content-body">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title">Add Booking</h4>
                  </div>
                  <div class="card-body">
                     <div class="basic-form">
                        <!-- Booking Form -->
                        <form id="bookingForm" enctype="multipart/form-data">
                           <div class="form-row">
                              <!-- Existing Fields -->
                              <div class="form-group col-md-6">
                                 <label> Customer Name</label>
                                 <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Customer Email</label>
                                 <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Customer Phone</label>
                                 <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Customer Address</label>
                                 <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                              </div>
                              
                               <div class="form-group col-md-6">
                                 <label>Landmark</label>
                                 <input type="text" class="form-control" id="address" name="Landmark" placeholder="Enter Nearby Landmark" required>
                              </div>
                               <div class="form-group col-md-6">
                                    </div>
                              <!-- Location Fields -->
                              <div class="form-group col-md-6">
                                 <label>Latitude</label>
                                 <input type="text" class="form-control" id="lati" name="lati" placeholder="Latitude" readonly required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Longitude</label>
                                 <input type="text" class="form-control" id="longi" name="longi" placeholder="Longitude" readonly required>
                              </div>
                              <div id="map" style="height: 300px; width: 80%; margin: 20px auto;"></div>
                              <div class="form-group col-md-12">
                                 <button type="button" class="btn btn-danger" onclick="getLocation()" style="display: block; margin: 0 auto;">Locate Me</button>
                              </div>
                              
                               <!-- City Dropdown -->
                <div class="form-group col-md-6 mb-3">
                    <label for="city">City</label>
                    <select class="form-control" id="city" name="city" required>
                        <option value="">Select City</option>
                        <?php
                        // Reset result pointer to fetch cities separately
                        mysqli_data_seek($result, 0);
                        $citiesSeen = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (!in_array($row['city'], $citiesSeen)) {
                                echo '<option value="' . htmlspecialchars($row['city']) . '">' . htmlspecialchars($row['city']) . '</option>';
                                $citiesSeen[] = $row['city'];
                            }
                        }
                        ?>
                    </select>
                </div>
                
                 <div class="form-group col-md-6">
                                 <label> Area</label>
                                 <input type="text" class="form-control" id="name" name="area" placeholder="Enter Area" required>
                              </div>
                
                              <!-- New Fields: Electricity Bill and Gallery -->
                              <div class="form-group col-md-6">
                                 <label>Electricity Bill</label>
                                 <input type="file" class="form-control" id="electricity_bill" name="electricity_bill" accept="image/*" required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Image Gallery</label>
                                 <input type="file" class="form-control" id="gallery" name="gallery[]" accept="image/*" multiple required>
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Book Visit Date</label>
                                 <input type="date" class="form-control" name="booking_date" required>
                              </div>
                           </div>
                           <!-- Submit Button -->
                           <button type="button" class="btn btn-primary" id="submit" disabled onclick="submitBooking()">Add Booking</button>
                        </form>
                        <!-- OTP Field (Initially Hidden) -->
                        <div id="otpSection" style="display: none; margin-top: 20px;">
                           <h5>Enter OTP to Confirm Booking</h5>
                           <input type="text" id="otp" class="form-control" placeholder="Enter OTP" required>
                           <button type="button" class="btn btn-success" style="margin-top: 10px;" onclick="confirmBooking()">Confirm OTP</button>
                        </div>
                        <!-- Thank You Page (Initially Hidden) -->
                        <div id="thankYouPage" style="display:none; margin-top: 20px;">
                           <h2>Thank You for Your Booking!</h2>
                           <p>Your booking has been successfully confirmed.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Content body end -->
   <!-- JavaScript for Validation and Geolocation -->
   <script>
      // Initialize Google Map
      let map, marker;
      function initMap() {
          const defaultPosition = { lat: -34.397, lng: 150.644 };
          map = new google.maps.Map(document.getElementById("map"), { center: defaultPosition, zoom: 15 });
          marker = new google.maps.Marker({ position: defaultPosition, map: map, draggable: true });
          marker.addListener("dragend", function() {
              const position = marker.getPosition();
              document.getElementById("lati").value = position.lat();
              document.getElementById("longi").value = position.lng();
          });
      }
      
      function getLocation() {
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                  const userPosition = { lat: position.coords.latitude, lng: position.coords.longitude };
                  map.setCenter(userPosition);
                  marker.setPosition(userPosition);
                  document.getElementById("lati").value = userPosition.lat;
                  document.getElementById("longi").value = userPosition.lng;
              }, function(error) {
                  console.error("Error fetching geolocation: ", error);
                  alert("Unable to fetch location. Please allow location access and try again.");
              }, { enableHighAccuracy: true });
          } else {
              alert("Geolocation is not supported by this browser.");
          }
      }
      
      window.onload = initMap;
      
      // Enable Submit Button when files are uploaded
      document.getElementById('electricity_bill').addEventListener('change', checkFiles);
      document.getElementById('gallery').addEventListener('change', checkFiles);
      
      function checkFiles() {
          const billUploaded = document.getElementById('electricity_bill').files.length > 0;
          const galleryUploaded = document.getElementById('gallery').files.length > 0;
          document.getElementById('submit').disabled = !(billUploaded && galleryUploaded);
      }
      
      
      
      function submitBooking() {
      let formData = new FormData(document.getElementById('bookingForm'));
      
      $.ajax({
          url: 'booking_pro.php', // Backend URL for processing
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          dataType: 'json',  // Ensure jQuery automatically parses the JSON response
          success: function(response) {
              console.log('Parsed Response:', response);  // Log the parsed response
      
              if (response.status === 'success') {
                  document.getElementById('otpSection').style.display = 'block';
                  alert(response.message);  // Show success message
              } else {
                  alert('Error: ' + response.message);  // Handle error if status is not 'success'
              }
          },
          error: function(xhr, status, error) {
              console.error('AJAX Error:', error);
              console.error('Response Text:', xhr.responseText);  // Log the raw response text
              alert('Failed to submit booking. Please try again.');
          }
      });
      }
      
      
      
      
      // Confirm Booking after OTP
      function confirmBooking() {
      const otp = document.getElementById('otp').value;
      
      if (otp) {
          // AJAX request for OTP confirmation
          $.ajax({
              url: 'confirm_booking', // Backend URL to confirm OTP
              type: 'POST',
              data: { otp: otp },  // Send the OTP as form data
              dataType: 'json',  // Ensure jQuery automatically parses the JSON response
              success: function(response) {
                  console.log('Parsed Response:', response);  // Log the parsed response for debugging
      
                  if (response.status === 'success') {
                      // Show Thank You message and hide OTP field
                    const ms_id = '1234';  // You can dynamically generate or fetch this ID as needed
                      window.location.href = `mess.php?ms_id=${ms_id}`;  // Redirect to the thank you page
      
                      document.getElementById('otpSection').style.display = 'none';      // Hide OTP input section
                      document.getElementById('bookingForm').reset();                    // Reset booking form
                  } else {
                      alert('Incorrect OTP. Please try again.');  // Alert on incorrect OTP
                  }
              },
              error: function(xhr, status, error) {
                  console.error('AJAX Error:', error);  // Log AJAX errors
                  console.error('Response Text:', xhr.responseText);  // Log raw response for debugging
                  alert('Failed to confirm OTP. Please try again.');  // Display an alert in case of failure
              }
          });
      } else {
          alert("Please enter the OTP.");  // If OTP is empty, show a prompt
      }
      }
      
   </script>
   
   
  <script>
  
    // Basic validations (LiveValidation setup remains the same)
    var name = new LiveValidation('name', { validMessage: 'Validated', wait: 100 });
    name.add(Validate.Presence, { failureMessage: "Name cannot be blank!" });
    name.add(Validate.Length, { minimum: 3, maximum: 40 });
    name.add(Validate.Format, { pattern: /^[a-zA-Z ,.'-]+$/i });

    var email = new LiveValidation('email', { validMessage: 'Validated', wait: 100 });
    email.add(Validate.Presence, { failureMessage: "Email cannot be blank!" });
    email.add(Validate.Format, { pattern: /^[^@\s]+@[^@\s]+\.[^@\s]+$/ });

    var phone = new LiveValidation('phone', { validMessage: 'Validated', wait: 100 });
    phone.add(Validate.Presence, { failureMessage: "Phone cannot be blank!" });
    phone.add(Validate.Length, { minimum: 10, maximum: 10 });
    phone.add(Validate.Format, { pattern: /^[0-9]{10}$/ });
</script>
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