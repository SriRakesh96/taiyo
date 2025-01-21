<?php

include('offline.php');


include('doctype.php');

?>

<head>
		<!-- Title -->
        <title>Taiyo Labs :: View Blogs</title>	
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
							<h2>View Blog</h2>
							<ul class="bread-list">
								<li><a href="index.php">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">View Blog</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Single News -->
		<section class="news-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="row">
								<?php
						
							$blog_id=$_GET['blog_id'];	
							
			$blog_fetch="SELECT * FROM blog WHERE blog_id='$blog_id' AND act='1' ORDER BY blog_add_date DESC";
           
           $blog_conn=mysqli_query($conn,$blog_fetch);
           
            $sno = $row + 1;
            
           while ($row4 = mysqli_fetch_assoc($blog_conn))
    {
          		
		  
				
           $blog_name=$row4['blog_title'];
          
          $blog_img=$row4['blog_img'];
          
          
          $blog_desc=$row4['blog_desc'];
          
           $blog_date=$row4['blog_add_date'];	
							
							
							
							}
							
							?>
							
							
							<div class="col-12">
								<div class="single-main">
									<h1 class="news-title"><?php echo $blog_name; ?></h1>
									
									<!-- News Head -->
									<div class="news-head">
										<img src="images/blog/<?php echo $blog_img; ?>" alt="#">
									</div>
									<!-- News Title -->
								
									<!-- Meta -->
									<div class="meta">
										<div class="meta-left">
									
											<span class="date"><i class="fa fa-clock-o"></i><?php echo $blog_date; ?></span>
										</div>
									
									</div>
									<!-- News Text -->
									<div class="news-text">
										<p><?php echo $blog_desc; ?></p>
											</div>
									
								</div>
							</div>
						
						
						</div>
					</div>
	
				</div>
			</div>
		</section>
		<!--/ End Single News -->
		
		
		

<?php

include('footer.php');

?>

<?php

include('footerjs.php');

?>

    </body>

</html>

