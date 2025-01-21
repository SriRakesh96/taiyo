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

include('dash_header.php');

?>



	<!-- Single News -->
		<section class="blog grid section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="row">
						
						<?php
				
        $limit =6;
        if (isset($_GET["page"]))
        {
            $page = $_GET["page"];
        }
        else
        {
            $page = 1;
        };
        $start_from = ($page - 1) * $limit;
        
        
        
        
							$blog_fetch="SELECT * FROM blog WHERE act='1' ORDER BY blog_add_date DESC LIMIT $start_from, $limit";
           
           $blog_conn=mysqli_query($conn,$blog_fetch);
           
            $sno = $row + 1;
            
           while ($row4 = mysqli_fetch_assoc($blog_conn))
    {
          		
		  
			$blog_id=$row4['blog_id'];
			
			$adm_id=$row4['adm_id'];		
												
           $blog_name=$row4['blog_title'];
          
          $blog_img=$row4['blog_img'];
          
          
          $blog_desc=$row4['blog_desc'];
          
           $blog_date=$row4['blog_add_date'];	
							
					
					echo"	<div class=\"col-lg-4 col-md-6 col-12\">
								<!-- Single Blog -->
								<div class=\"single-news\">
									<div class=\"news-head\">
										<img src=\"../images/blog/$blog_img\" alt=\"#\">
									</div>
									<div class=\"news-body\">
										<div class=\"news-content\">
											<div class=\"date\">$blog_date</div>
											<h2><a href=\"view_blog.php?blog_id=$blog_id\">$blog_name</a></h2>
											<p class=\"text\">$blog_desc</p>
										</div>
										
																				<div class=\"news-content\">
											<a href=\"edit_blog.php?blog_id=$blog_id\" class=\"date\">Edit Blog</a>
											<a href=\"delete_blog.php?blog_id=$blog_id\" class=\"date\">Delete Blog</a>
										</div>
									</div>
								</div>
								<!-- End Single Blog -->
							</div>";
							
						
					
						
    }
    
    ?>
						
						
						
						
						 <?php
        $result_db = mysqli_query($conn, "SELECT COUNT(id) FROM blog");
        $row_db = mysqli_fetch_row($result_db);
        $total_records = $row_db[0];
        $total_pages = ceil($total_records / $limit);
        /* echo  $total_pages; */
        $pagLink = " 
                      <div class=\"col-12\">
							
								<div class=\"pagination\">
									<ul class=\"pagination-list\">
					";
							
        for ($i = 1;$i <= $total_pages;$i++)
        {

            $pagLink .= "<li><a href='view_blogs.php?page=" . $i . "'>$i</a></li>";
        }
        echo $pagLink . "  
										<li></li>
										</ul>
								</div>
								</div>
					
					
	
				</div>
							
                  ";
?>
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

<?php
   }
   
   else
   {
       echo "<meta http-equiv=\"refresh\" content=\"1;url=invalid.php?msg_id=jdSaJZ\" />";
   }
   
   ?>