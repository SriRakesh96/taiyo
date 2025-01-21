<?php

include('offline.php');


include('doctype.php');

?>

<head>
	 <meta name="description" content="Contact Taiyo Labs for inquiries, collaborations, and testing service requests. Find our contact information and reach out to our customer support team for assistance.">
  <meta name="keywords" content="Taiyo Labs, Contact Us, Contact information, Inquiries, Collaborations, Testing services, Customer support">
  <title>Contact Us - Taiyo Labs</title>
<?php

include('head.php');

?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16507622234">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-16507622234');
</script>


  </head>

<style>
    

.whats_app_chat {
    position: fixed;
    left: 25px;
    bottom: 20px;
    z-index: 99999999;
    display: inline-block;
    padding-left: 2px;
    padding-right: 12px;
    padding-top: 0px;
    padding-bottom: 0px;
    border-radius: 25px;
    font-size: 15px;
    background-color: #e4e4e4;
  
  
</style>
<div class="whats_app_chat">
	<a style="color: rgb(53, 46, 46);" href="https://api.whatsapp.com/send?phone=919109565758" target="_blank">
	    <img src="images/whatsapp-logo2.gif" style="width:50px;margin-right: 12px;">WhatsApp - (+91) 9109565758</a>
</div>

    <body>
	
	<!-- Preloader -->
        <!--<div class="preloader">-->
        <!--    <div class="loader">-->
        <!--        <div class="loader-outter"></div>-->
        <!--        <div class="loader-inner"></div>-->

        <!--        <div class="indicator"> -->
        <!--            <svg width="16px" height="12px">-->
        <!--                <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>-->
        <!--                <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>-->
        <!--            </svg>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
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
							<h2>Contact Us</h2>
							<ul class="bread-list">
								<li><a href="index.php">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Contact Us</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Start Contact Us -->
		<section class="contact-us section">
			<div class="container">
				<div class="inner">
					<div class="row"> 
						<div class="col-lg-6">
							<div class="contact-us-left">
								<!--Start Google-map -->
							 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1900.055619800219!2d83.30349870723077!3d17.739396997727923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a3943320eb338a5%3A0x3a24e54b6c0daaa7!2sBalayya%20Sastri%20Layout%2C%20Seethammadara%2C%20Visakhapatnam%2C%20Andhra%20Pradesh%20530013!5e0!3m2!1sen!2sin!4v1646044832936!5m2!1sen!2sin" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
								<!--/End Google-map -->
							</div>
						</div>
						<div class="col-lg-6">
							<div class="contact-us-form">
								<h2>Contact Us</h2>
								<p>If you have any questions please fell free to contact us.</p>
								<!-- Form -->
								<form class="form" method="post" action="contact_pro.php" name="contactus">
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
   
   
   
   
				
				<?php
				
				$fetch_cont="SELECT * FROM website WHERE act='1'";
				
				$fetch_query=mysqli_query($conn, $fetch_cont);
				
				while($row=mysqli_fetch_assoc($fetch_query)){
				    
				    $phone=$row['phone'];
				    
				   $address=$row['address'];
				   
				   $email=$row['email'];
				    
				    
				}
				
				
				?>
				
				
				
				<div class="contact-info">
					<div class="row">
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info" style="height: 220px;">
								<i class="icofont-google-map"></i>
								<div class="content">
									<h3>Taiyo Labs</h3>
									<p><?php echo $address; ?></p>
								</div>
							</div>
						</div>
						<!--/End single-info -->
						
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info" style="height: 220px;">
								<i class="icofont icofont-ui-call"></i>
								<div class="content">
									<h3><?php echo $phone; ?></h3>
									<p><?php echo $email; ?></p>
								</div>
							</div>
						</div>
						<!--/End single-info -->
					
						<!-- single-info -->
						<div class="col-lg-4 col-12 ">
							<div class="single-info" style="height: 220px;">
								<i class="icofont icofont-wall-clock"></i>
								<div class="content">
								
								<h3>Timings</h3>	<p>MON - SAT : 07:00 AM TO 09:00 PM</p>
<p>SUNDAY & PUBLIC HOLIDAYS : 07:00 AM TO 03:00 PM</p>
								
								</div>
							</div>
						</div>
						<!--/End single-info -->
					</div>
				</div>
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

		