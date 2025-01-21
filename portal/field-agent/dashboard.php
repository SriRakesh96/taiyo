<?php
   include('offline.php');
   
   if (!empty($_COOKIE['fagn_email']) && !empty($_COOKIE['fagn_password'])) {
       $cookie_email = $_COOKIE['fagn_email'];
       $cookie_password = $_COOKIE['fagn_password'];
   
       $user_data = "SELECT * FROM taiyo_fagent WHERE email='$cookie_email'";
       $user_conn = mysqli_query($conn, $user_data);
   
       while ($row6 = mysqli_fetch_assoc($user_conn)) {
           $type = $row6['access_type'];
           $access_id = $row6['access_id'];
           $ename = $row6['name'];
           $branch = $row6['branch'];
           $branchn = $row6['branch_name'];
   
       }
   
       include('doctype.php');
   ?>
   
   <script>
        // Check if the page has already been refreshed in this session
        if (!sessionStorage.getItem('hasRefreshed')) {
            sessionStorage.setItem('hasRefreshed', 'true'); // Mark the page as refreshed
            window.location.reload(true); // Perform a hard refresh
        }
    </script>
    
    
<head>
   <title><?php echo $type; ?></title>
   <?php include('head.php'); ?>
   <link href="calender.css" rel="stylesheet" type="text/css">
   <style>
      .card {
      background-color: #f3f3f3 !important;
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
      
     @media only screen and (max-width: 600px) {

 #bt{
          margin-top:15px;
          
}

         
     }
   </style>
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
            <!--<div class="row">
               <div class="col-xl-8 col-xxl-8" style="display: block;margin: 0 auto;">
                   <?php
                  /*  include("calender.php");
                    $year = $_GET['year'] ?? date('Y');
                    $month = $_GET['month'] ?? date('m');
                    $calendar = new Calendar($year, $month);
                  
                    $sqlEvents = "SELECT DISTINCT(booking_date) FROM patients WHERE created_id='$access_id' AND act='1' LIMIT 20";
                    $resultset = mysqli_query($conn, $sqlEvents);
                    while ($row4 = mysqli_fetch_array($resultset)) {
                        $book_date = $row4['booking_date'];
                        $calendar->add_event('Bookings', $book_date, 'event-green');
                    }*/
                  
                   // echo $calendar;
                    ?>
               </div>
               </div>-->
            <h4 class="card-title text-center" style="margin:15px 0px">Bookings Available to Complete</h4>
            <div class="row" id="patientList">
               <!-- Dynamic patient list will be loaded here -->
            </div>
         </div>
      </div>
      <?php include('footer.php'); ?>
   </div>
   <?php include('footerjs.php'); ?>
<script>
    let previousPatientCount = 0; // Variable to track the number of previous patients

   function playSoundAlert() {
    const audio = new Audio('alert.mp3');
    audio.volume = 1.0;

    audio.play()
        .then(() => {
            console.log('Audio playback started successfully.');
        })
        .catch((error) => {
            console.error('Error during audio playback:', error);
        });

    let duration = 10 * 1000; // Duration in milliseconds (10 seconds)
    let endTime = Date.now() + duration;

    function playSound() {
        if (Date.now() < endTime) {
            audio.play().catch(console.error); // Catch any playback errors
            setTimeout(playSound, 1000); // Play sound every second
        }
    }

    playSound();
}

   function loadPatients() {
    $.ajax({
        url: 'get_patients.php',
        type: 'GET',
        data: {
            branch: '<?= $branch ?>',
            access_id: '<?= $access_id ?>',
            _: new Date().getTime() // Cache-busting parameter
        },
        dataType: 'json',
        success: function (data) {
            console.log(data); // Log the response data
            $('#patientList').empty(); // Clear existing patient list

            if (data.length > 0) {
                // Check if new bookings are found
                if (data.length > previousPatientCount) {
                    playSoundAlert(); // Play sound alert if new bookings are found
                }

                data.forEach(function (patient) {
                    var patientCard = `
                        <div class="col-xl-6 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title text-center">Patient: ${patient.patient_id}</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>TRF: <br></strong><img src="${patient.trf}" width="30%"> </p>
                                    <p><strong>Collection Items:</strong> ${patient.c_i}</p>
                                    <p><strong>Collection Type:</strong> ${patient.c_type}</p>
                                    <p><strong>Address:</strong> ${patient.address}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="booking_prog.php?id=${patient.patient_id}&act=done" 
                                       class="btn btn-success" 
                                       onclick="confirmAction(event, 'Mark as Completed')">Mark as Completed</a>
                                    <a href="booking_prog.php?id=${patient.patient_id}&act=transfer" 
                                       class="btn btn-danger" id="bt" 
                                       onclick="confirmAction(event, 'Transfer Booking')">Transfer Booking</a>
                                </div>
                            </div>
                        </div>
                    `;
                    $('#patientList').append(patientCard);
                });

                // Update the count of previous patients
                previousPatientCount = data.length;
            } else {
                $('#patientList').append('<div class="col-12 text-center"><p style="color:red;border-radius:20px;background:#d8d8d8;font-weight:700;display:inline-block;padding:10px">No bookings available at the moment.</p></div>');

                // Reset previous patient count if no patients are found
                previousPatientCount = 0;
            }
        }
    });
}

    // Load patients when the page is loaded
    $(document).ready(function() {
        loadPatients(); // Initial load
        setInterval(loadPatients, 10000); // Refresh every 5 seconds
    });
</script>


   <script>
      function confirmAction(event, action) {
          // Show a confirmation dialog with Yes/No
          const userConfirmed = confirm('Are you sure you want to ' + action + '?');
      
          if (userConfirmed) {
              // If the user clicked "Yes", proceed with the action (navigate to the link)
              window.location.href = event.target.href;
          } else {
              // If the user clicked "No", prevent the navigation
              event.preventDefault();
          }
      }
   </script>
</body>
</html>
<?php
   } else {
       echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid?ms_id=jn63eJ\" />";
   }
   ?>