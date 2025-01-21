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
        <title>Taiyo Labs :: Update Site Data</title>	
<?php

include('head.php');

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

				
		<!-- Start Contact Us -->
		<section class="contact-us section">
			<div class="container">
			   <div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Update site Data</h2>
							<img src="img/section-img.png" alt="#">
						
						</div>
					</div>
				</div>
				
				<div class="inner">
					<div class="row"> 
			
						<div class="col-lg-12">
							<div class="contact-us-form">
								<h2>Update Site Data</h2>
							<?php
							
							
							$site_data="SELECT * FROM website WHERE act='1'";
							
							$site_query=mysqli_query($conn,$site_data);
							
							while($row3=mysqli_fetch_assoc($site_query)){
							    
							    
							    $name=$row3['name'];
							    
							    $email=$row3['email'];
							    
							    $support_email=$row3['support_email'];
							    
							    $phone=$row3['phone'];
							    
							    $address=$row3['address'];
						
							    
							}
							
							
							?>
							
							
							
								<!-- Form -->
								<form class="form" method="post" action="upd_site_pro.php" name="upd_site">
									<div class="row">
										<input type="hidden" name="adm_id"  value="<?php echo $adm_id; ?> ">
										
										
										<div class="col-lg-12">
											<div class="form-group">
												<input type="text" name="name" id="name" placeholder="Name" value="<?php echo $name; ?> ">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?> ">
											</div>
										</div>
										
											<div class="col-lg-12">
											<div class="form-group">
												<input type="email" name="s_email" id="s_email" placeholder="Support Email" value="<?php echo $support_email; ?> ">
											</div>
										</div>
										
										
										
										<div class="col-lg-12">
											<div class="form-group">
												<input type="text" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?> ">
											</div>
										</div>
										
										<div class="col-lg-12">
											<div class="form-group">
												<input type="text" name="address" id="address" placeholder="Address" value="<?php echo $address; ?> " >
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Update Site Data</button>
											</div>
										
										</div>
									</div>
								</form>
								<!--/ End Form -->
							</div>
						</div>
					</div>
				</div>
				
				
				   <script  type="text/javascript">
      var frmvalidator = new Validator("upd_site");
      
      frmvalidator.addValidation("name","req","Enter Site Name");
      
      
      frmvalidator.addValidation("email","maxlen=50");
      frmvalidator.addValidation("email","req","Enter Site Email");
 
       frmvalidator.addValidation("s_email","maxlen=50");
      frmvalidator.addValidation("s_email","req","Enter Support Email");
      
      
      frmvalidator.addValidation("phone","req","Enter Site Phone Number");
      
      
      frmvalidator.addValidation("address","req","Enter Site Message");
      
 
   </script>
   
   	
   
			</div>
		</section>
		<!--/ End Contact Us -->



		
		
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
