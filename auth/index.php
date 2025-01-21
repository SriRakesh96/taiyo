<?php

include('doctype.php');

?>

<head>
		<!-- Title -->
        <title>Taiyo Labs :: Admin Login</title>	
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

include('header.php');

?>




				
		<!-- Shop Login -->
		<section class="login section">
			<div class="container">
				<div class="inner">
				
						<div class="col-lg-12">
							<div class="login-form">
								<h2>Login Here</h2>
							
								<!-- Form -->
								<form class="form" method="post" action="login_pro.php" name="login">
									<div class="row">
								
										<div class="col-lg-10">
											<div class="form-group">
												<input type="email" name="email" placeholder="Enter Your Email">
											</div>
										</div>
										<div class="col-lg-10">
											<div class="form-group">
												<input type="password" name="password" placeholder="Enter Your Password">
											</div>
										</div>
									
										<div class="col-6">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Login</button>
											</div>
										
										
										</div>
									</div>
								</form>
								<!--/ End Form -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Login -->
		
		
		 <script  type="text/javascript">
      var frmvalidator = new Validator("login");
      
 
 frmvalidator.addValidation("email","maxlen=50");
 frmvalidator.addValidation("email","req");

 
 frmvalidator.addValidation("password","req","The password field is mandatory");
 frmvalidator.addValidation("password","minlen=8","Minimum password length is 8");
 frmvalidator.addValidation("password","maxlen=20","Maximum password length is 20");
      
   </script>
		
<?php

include('footer.php');

?>

<?php

include('footerjs.php');

?>

    </body>

</html>

