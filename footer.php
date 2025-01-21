		
		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>TAIYO LABS is one of the most trusted, one-stop solutions for all complex pathology tests. We believe that the accurate diagnosis of a health issue is vital for further treatment</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="https://www.facebook.com/TAIYOLABS"><i class="icofont-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/taiyolabs/"><i class="icofont-instagram"></i></a></li>
									<!--<li><a href="#"><i class="icofont-twitter"></i></a></li>-->
						
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Quick Links</h2>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-12">
										<ul>
									
											<li><a href="about.php"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="health_package.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Health Packages</a></li>
											<li><a href="blog.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Blogs</a></li>
											<li><a href="contact.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>
											
											<li><a href="privacy-policy.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Privacy Policy</a></li>	
										</ul>
									</div>
									
								</div>
							</div>
						</div>
					
					
						<?php
				
				$fetch_cont="SELECT * FROM website WHERE act='1'";
				
				$fetch_query=mysqli_query($conn,$fetch_cont);
				
				while($row=mysqli_fetch_assoc($fetch_query)){
				    
				    $phone=$row['phone'];
				    
				   $address=$row['address'];
				   
				   $email=$row['email'];
				    
				    
				}
				
				
				?>
				
				
				<div class="col-lg-4 col-md-6 col-12">
							<div class="single-footer">
								<h2>Address</h2>
								<p><?php echo $address; ?></p>
								<ul class="time-sidual">
									<li class="day">Email : <?php echo $email; ?></li>
									<li class="day">Phone : <?php echo $phone; ?></li>
							
								</ul>
							</div>
						</div>
					
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>Powered By<a href="https://techventos.com/" rel="nofollow" target="_blank">Techventos Solutions</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->


