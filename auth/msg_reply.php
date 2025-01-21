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
        <title>Taiyo Labs :: Message Reply</title>	
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
								<h2>Reply Message</h2>
						


<?php

$msg_id=$_GET['msg_id'];


$msg_fetch="SELECT * FROM contact_us WHERE msg_id='$msg_id' ORDER BY msg_time DESC ";
								
								$msg_f_conn=mysqli_query($conn,$msg_fetch);
								
							
								  
								while($row2=mysqli_fetch_assoc($msg_f_conn)){
								    
							
								 $name=$row2['name'];
								 
								 $email=$row2['email'];
								 
								 $phone=$row2['phone'];
								        
								 $message=$row2['message'];
								 
								 $msg_time=$row2['msg_time'];
								            
								}



?>
								<!-- Form -->
								<form class="form" method="post" action="rep_msg_pro.php" enctype="multipart/form-data">
									<div class="row">
								<input type="hidden" name="msg_id" value="<?php echo $msg_id; ?>">
								
								
								<div class="col-lg-10">
											<div class="form-group">
											     <label>Message</label>
												<textarea  rows="4" readonly required><?php echo $message; ?></textarea>
											</div>
										</div>
									
									
									
									
										<div class="col-lg-10">
											<div class="form-group">
											     <label>Your Reply</label>
												<textarea name="reply_msg" placeholder="Your Message" rows="4" required></textarea>
											</div>
										</div>
										
										
										
										<div class="col-6">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Reply Message</button>
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

<?php
   }
   
   else
   {
       echo "<meta http-equiv=\"refresh\" content=\"1;url=error.php?msg_id=blRXgO\" />";
   }
   
   ?>
