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
   
       include('doctype.php');
   ?>
<head>
   <title><?php echo $type; ?> </title>
   <?php include('head.php'); ?>
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
      <!--**********************************
         Content body start
         ***********************************-->
      <div class="content-body">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Transferred Patients</h4>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="patients_data" class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th style="width:80px;"><strong>S.No</strong></th>
                                    <th><strong>Patient ID</strong></th>
                                    <th><strong>TRF</strong></th>
                                    <th><strong>From Agent</strong></th>
                                    <th><strong>To Agent</strong></th>
                                    <th><strong>Transferred On</strong></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $query = "
                                        SELECT 
                                            p.patient_id AS pat_id, 
                                            p.trf_form AS trf,
                                            p.misc_date AS miscdate,
                                            fa1.name AS from_agent, 
                                            fa1.phone AS from_agent_phone,  -- Add phone number for the 'from' agent
                                            fa2.name AS to_agent,
                                            fa2.phone AS to_agent_phone    -- Add phone number for the 'to' agent
                                        FROM patients p
                                        LEFT JOIN taiyo_fagent fa1 ON p.misc2 = fa1.access_id
                                        LEFT JOIN taiyo_fagent fa2 ON p.updated_by = fa2.access_id
                                        WHERE p.branch = '$access_id' 
                                            AND p.act = '2' 
                                            AND p.misc = 'transferred'
                                        ORDER BY p.id DESC";
                                    
                                    $result = mysqli_query($conn, $query);  
                                    
                                    $sno = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {    
                                        $pat_id = $row['pat_id'];
                                        $trf = $row['trf'];
                                        $from_agent = $row['from_agent'] ?: 'N/A'; 
                                        $from_agent_phone = $row['from_agent_phone'] ?: 'N/A';  // Get the phone number for 'from' agent
                                        $to_agent = $row['to_agent'] ?: 'N/A';
                                        $to_agent_phone = $row['to_agent_phone'] ?: 'N/A';  // Get the phone number for 'to' agent
                                        $misc_date = $row['miscdate'];
                                        
                                        // Display the agent names and phone numbers
                                        echo "<tr>
                                            <td><strong>$sno</strong></td>
                                            <td>$pat_id</td>
                                            <td><img src=\"$trf\" width=\"50%\"></td>
                                            <td>$from_agent <br> ($from_agent_phone)</td>  <!-- Display name and phone number for from agent -->
                                            <td>$to_agent <br> ($to_agent_phone)</td>  <!-- Display name and phone number for to agent -->
                                            <td>$misc_date</td>
                                        </tr>";
                                        $sno++;   
                                    }
                                    ?>
                              </tbody>
                           </table>
                           <script>  
                              $(document).ready(function(){  
                                  $('#patients_data').DataTable();  
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
   <!--**********************************
      Main wrapper end
      ***********************************-->
   <?php include('footerjs.php'); ?>
</body>
</html>
<?php
   } else {
       echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
   }
   ?>