<?php
   include('offline.php');
   // Prevent browser caching
   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");
   
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
   <?php
      include('head.php');
      
      
      ?>
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
      <!--**********************************
         Content body start
         ***********************************-->
      <div class="content-body">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Pending Patients</h4>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table id="patients_data" class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                    <th style="width:80px;"><strong>S.No</strong></th>
                                    <th><strong>Patient ID</strong></th>
                                    <th><strong>TRF</strong></th>
                                    <th><strong>Collected Items</strong></th>
                                    <th><strong>Collection Type</strong></th>
                                    <th><strong>Address</strong></th>
                                    <th><strong>Assigned To</strong></th>
                                    <th><strong>Action</strong></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php 
                                    $patient_fetch = "SELECT * FROM patients WHERE collection_type='HomePickup' AND branch='$access_id' AND act='2' AND prog ='' ORDER BY id DESC";
                                    $fetch_query = mysqli_query($conn, $patient_fetch);  
                                    
                                    $sno = 1;
                                    while ($row = mysqli_fetch_array($fetch_query)) {    
                                        $patient_id = $row['patient_id'];
                                       $trf=$row['trf_form'];
                                        $collected_items = $row['collected_items'];
                                        $collection_type = $row['collection_type'];
                                        $assigned=$row['updated_by'];
                                      
                                    $query = "SELECT * FROM taiyo_fagent WHERE access_id = '$assigned'";
                                    $result = mysqli_query($conn, $query);
                                    
                                    // Check if the query was successful and return the agent's name
                                    if ($result) {
                                    $agent = mysqli_fetch_assoc($result); // Fetch the first result (assuming there's only one)
                                    $agent_name = $agent['name']; // Store the agent's name in a variable
                                    $agent_num=$agent['phone'];
                                    
                                    }
                                        $address=$row['address'];
                                    
                                        echo "<tr>
                                            <td><strong>$sno</strong></td>
                                            <td>$patient_id</td>
                                            <td><img src=\"$trf\" width=\"50%\"></td>
                                           
                                            <td>$collected_items</td>
                                            <td>$collection_type</td>
                                          
                                             <td>$address</td>
                                               <td>$agent_name <br> ($agent_num)</td>
                                            <td>
                                                <div class=\"dropdown\">
                                                    <button type=\"button\" class=\"btn btn-success light sharp\" data-toggle=\"dropdown\">
                                                        <svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" version=\"1.1\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"></rect><circle fill=\"#000000\" cx=\"5\" cy=\"12\" r=\"2\"></circle><circle fill=\"#000000\" cx=\"12\" cy=\"12\" r=\"2\"></circle><circle fill=\"#000000\" cx=\"19\" cy=\"12\" r=\"2\"></circle></g></svg>
                                                    </button>
                                                    <div class=\"dropdown-menu\">
                                                        <a class=\"dropdown-item\" href=\"edit_patient?patient_id=$patient_id\">Edit</a>
                                                        <a class=\"dropdown-item\" href=\"delete_patient?patient_id=$patient_id\" onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
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
      <?php
         include('footer.php');
         
         
         ?>
   </div>
   <!--**********************************
      Main wrapper end
      ******-->
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