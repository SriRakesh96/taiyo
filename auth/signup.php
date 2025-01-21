<?php

include('doctype.php');

?>

<head>
		<!-- Title -->
        <title>Taiyo Labs :: Home</title>	
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



	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Sign Up</h2>
							<ul class="bread-list">
								<li><a href="index.html">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Login</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Shop Login -->
		<section class="login section">
			<div class="container">
				<div class="inner">
				
						<div class="col-lg-12">
							<div class="login-form">
								<h2>Registration Here</h2>
								<p>Didn't you account yet ? <a href="signup.php">Register Here</a></p>
								<!-- Form -->
								<form class="form" method="post" action="#">
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
		
<?php

include('footer.php');

?>

<?php

include('footerjs.php');

?>

    </body>

</html>

