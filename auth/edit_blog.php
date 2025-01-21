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
        <title>Taiyo Labs :: Edit Blog</title>	
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
								<h2>Edit Blog</h2>
							<p>You cannot edit Previous image of Blog</p>


<?php

$blog_id=$_GET['blog_id'];


	$blog_fetch="SELECT * FROM blog WHERE blog_id='$blog_id' AND act='1'";
           
           $blog_conn=mysqli_query($conn,$blog_fetch);
           
         
           while ($row4 = mysqli_fetch_assoc($blog_conn))
    {
          		
		  
				
           $blog_name=$row4['blog_title'];
          
      $blog_desc=$row4['blog_desc'];
          
       			
							
							}



?>
								<!-- Form -->
								<form class="form" method="post" action="edit_blog_pro.php" name="editblog" enctype="multipart/form-data">
									<div class="row">
								<input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
								
								
								
										
												<div class="col-lg-10">
											<div class="form-group">
											    <label>Blog Title</label>
												<input type="text" name="name" placeholder="Enter Blog Name" value="<?php echo $blog_name; ?>">
											</div>
										</div>
										
													
											
										
										
											<div class="col-lg-10">
											<div class="form-group">
											     <label>Blog Description</label>
												<textarea name="description" placeholder="Your Message" rows="4"><?php echo $blog_desc; ?></textarea>
											</div>
										</div>
									
										<div class="col-6">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Edit Blog</button>
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
      var frmvalidator = new Validator("editblog");
      
      frmvalidator.addValidation("name","req","Enter Your Blog Title");
  

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
