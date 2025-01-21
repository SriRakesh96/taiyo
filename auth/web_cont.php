<?php
   session_start();
   
   include ('offline.php');
   
   if (!empty($_SESSION['sess_adm_email']) && !empty($_SESSION['sess_adm_password']))
   {
           $sess_email = $_SESSION['sess_adm_email'];
   
       $user_data = "SELECT * FROM super_admin WHERE email='$sess_email'";
   
       $user_conn = mysqli_query($conn, $user_data);
   
       while ($row6 = mysqli_fetch_assoc($user_conn))
       {
   
           $adm_id = $row6['adm_id'];
           
              $name = $row6['name'];
              
                
   }
   

include('doctype.php');

?>

<head>
		<!-- Title -->
        <title>Taiyo Labs :: Website Contact</title>	
<?php

include('head.php');

?>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>
   <style>
      #div_pagination{
      width:100%;
      margin-top:20px;
      margin-bottom:20px;
      text-align:center;
      }
      .button{
      border-radius:3px;
      border:0px;
      background-color:#1d293e;
      color:white;
      padding:10px 20px;
      letter-spacing: 1px;
      }
      .btn-primary2{
      color: #fff;
      background-color: #ef5e24;
      border-color: #ef5e24;
      }
   </style>
   <?php
      $rowperpage = 10;
      $row = 0;
      
      // Previous Button
      if(isset($_POST['but_prev'])){
          $row = $_POST['row'];
          $row -= $rowperpage;
          if( $row < 0 ){
              $row = 0;
          }
      }
      
      // Next Button
      if(isset($_POST['but_next'])){
          $row = $_POST['row'];
          $allcount = $_POST['allcount'];
      
          $val = $row + $rowperpage;
          if( $val < $allcount ){
              $row = $val;
          }
      }
      
      
      // count total number of rows
      $sql = "SELECT COUNT(*) AS cntrows FROM contact_us";
      $result = mysqli_query($conn,$sql);
      $fetchresult = mysqli_fetch_array($result);
      $allcount = $fetchresult['cntrows'];
      ?>
      
      
      
      
      
  </head>


    <body>
	
	<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
		
		
		
<?php

include('dash_header.php');

?>


	<!-- Start Doctor Calendar Area -->
        <section class="doctor-calendar-area section">
            <div class="container">
                <div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Website Contacted</h2>
							<img src="img/section-img.png" alt="#">
							<p>Customers Who Has Contacted Through Website</p>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-12">
						<div class="doctor-calendar-table table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>S.No</th>
										<th> Name/Email</th>
										<th>Phone</th>
									
										<th>Message</th>
										
											<th>Time</th>
											
												<th>Action</th>
								</tr>
								</thead>

								<tbody>
								
								
								<?php
									
								$msg_fetch="SELECT * FROM contact_us ORDER BY msg_time DESC limit $row,".$rowperpage;
								
								$msg_f_conn=mysqli_query($conn,$msg_fetch);
								
								  $sno = $row + 1;
								  
								while($row2=mysqli_fetch_assoc($msg_f_conn)){
								    
								 $msg_id=$row2['msg_id'];
								 
								 
								 $name=$row2['name'];
								    
								      $email=$row2['email'];
								      
								      
								        $phone=$row2['phone'];
								        
								        
								          $message=$row2['message'];
								          
								            $msg_time=$row2['msg_time'];
								    
								    
								    echo "
								    	<tr>
										<td><span class=\"time\"> $sno</span></td>
										<td>
											<h3>$name/$email</h3>
											
										</td>
										<td>
											<h3> $phone</h3>
										
										</td>
										
											<td>
											<h3> $message</h3>
										
										</td>
										
											<td>
											<h3> $msg_time</h3>
										
										</td>
										
											<td>
										<a href=\"msg_reply.php?msg_id=$msg_id\" class=\"btn\" style=\"color:#fff;\" > Reply</a>
										
										</td>
										
									</tr>
";
								    
				 $sno++;  				}
								
								
								
								
?>

								
								
								
								
								

								</tbody>
							</table>
							
							 
						</div>
						 <form method="post" action="">
                              <div id="div_pagination">
                                 <input type="hidden" name="row" value="<?php echo $row; ?>">
                                 <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                                 <input type="submit" class="btn" name="but_prev" value="Previous">
                                 <input type="submit" class="btn" name="but_next" value="Next">
                              </div>
                           </form>
					</div>
                </div>
            </div>
        </section>
        <!-- End Doctor Calendar Area -->

		
		
		<?php

include('footer.php');

?>

<?php

include('footerjs.php');

?>

    </body>

</html>

<?php
   }
   
   else
   {
       echo "<meta http-equiv=\"refresh\" content=\"1;url=error.php?msg_id=blRXgO\" />";
   }
   
   ?>