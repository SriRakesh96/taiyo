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
        <title>Taiyo Labs :: My Profile</title>	
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
				<div class="inner">
					<div class="row"> 
			
						<div class="col-lg-12">
							<div class="contact-us-form">
								<h2>Update Profile</h2>
							
								<!-- Form -->
								<form class="form">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<input type="text" name="name" id="name" placeholder="Name">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<input type="email" name="email" id="email" placeholder="Email" >
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<input type="text" name="phone" id="phone" placeholder="Phone" >
											</div>
										</div>
										
										<div class="col-lg-12">
											<div class="form-group">
												<textarea name="message" id="message" placeholder="Your Message" ></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Send Message</button>
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
      var frmvalidator = new Validator("contactus");
      
      frmvalidator.addValidation("name","req","Enter Your Name");
      
      
      frmvalidator.addValidation("email","maxlen=50");
      frmvalidator.addValidation("email","req","Enter Your Email");
      
      
      frmvalidator.addValidation("phone","req","Enter Your Phone Number");
      
      
      frmvalidator.addValidation("message","req","Enter Your Message");
      
      frmvalidator.addValidation("message","maxlen=500","Maximum message length is 500");
       
      
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
       echo "<meta http-equiv=\"refresh\" content=\"1;url=invalid.php?msg_id=jdSaJZ\" />";
   }
   
   ?>