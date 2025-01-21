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
           
         
                
   }
   


include('doctype.php');

?>

<head>
		<!-- Title -->
        <title>Taiyo Labs :: Add Blog</title>	
<?php

include('head.php');

?>

  </head>


    <body>

		
		
<?php

include('dash_header.php');

?>




				
		<!-- Shop Login -->
		<section class="login section">
			<div class="container">
				<div class="inner">
				
						<div class="col-lg-12">
							<div class="login-form">
								<h2>Add Blog</h2>
							
								<!-- Form -->
								<form class="form" method="post" action="add_blog_pro.php" name="addblog" enctype="multipart/form-data">
									<div class="row">
								<input type="hidden" name="adm_id" value="<?php echo $adm_id; ?>">
								
								
								
										
												<div class="col-lg-10">
											<div class="form-group">
											    <label>Blog Title</label>
												<input type="text" name="title" placeholder="Enter Blog Name">
											</div>
										</div>
										
													
												<div class="col-lg-10">
											<div class="form-group">
											     <label>Blog Image</label>
												<input type="file" name="blog_img">
											</div>
										</div>
										
										
											<div class="col-lg-10">
											<div class="form-group">
											     <label>Blog Description</label>
												<textarea name="description" placeholder="Your Message" rows="4"></textarea>
											</div>
										</div>
									
										<div class="col-6">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Add Blog</button>
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
      var frmvalidator = new Validator("addblog");
      
      frmvalidator.addValidation("title","req","Enter Your Blog Title");
  
      
      frmvalidator.addValidation("blog_img","req","Upload Your Blog Image");
      
      
      frmvalidator.addValidation("description","req","Enter Your Description");
      
      frmvalidator.addValidation("description","maxlen=500","Maximum message length is 500");
       
      
   </script>	
		

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
