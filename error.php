<?php

include('offline.php');

include('doctype.php');

?>

<head>
		<!-- Title -->
        <title>Taiyo Labs :: Errorn Message</title>	
<?php

include('head.php');

?>

  </head>


    <body>

<?php

include('header.php');

?>

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
      
      $msg_id=$_GET['msg_id'];
     
      $msg_fetch="SELECT * FROM message WHERE msg_id='$msg_id' AND act='1'";
      
      $msg_fetch_conn=mysqli_query($conn,$msg_fetch);
      
     while ($row = mysqli_fetch_assoc($msg_fetch_conn)){
         
         
         $msg=$row['message'];
         
         $redirect_link=$row['redirect_link'];
         
         $btn_text=$row['btn_text'];
     }
      
      
      
      ?>
      
      
      

		<!-- Mail Success Page -->
		<section class="mail-seccess section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
						<!-- Error Inner -->
						<div class="success-inner">
						    <img src="images/error.png" alt="error" width="300px">
							<h1><span><?php echo $msg; ?>!</span></h1>
							<p></p>
							<a href="<?php echo $redirect_link; ?>" class="btn"><?php echo $btn_text; ?></a>
						</div>
						<!--/ End Error Inner -->
					</div>
				</div>
			</div>
		</section>	
		<!--/ End Mail Success -->
		
		
		

<?php

include('footer.php');

?>

<?php

include('footerjs.php');

?>

    </body>

</html>

