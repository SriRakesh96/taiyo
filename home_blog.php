	<!-- Start Blog Area -->
		<section class="blog section" id="blog">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
						
							<h2>Keep in Touch..! With Our Most Recent News.</h2>
						
							<img src="images/section.png" alt="#">
						
						</div>
					</div>
				</div>
				<div class="row">
					
					
					
			<?php
						
							$blog_fetch="SELECT * FROM blog WHERE act='1' ORDER BY blog_add_date DESC LIMIT 3";
           
           $blog_conn=mysqli_query($conn,$blog_fetch);
          
              if(mysqli_num_rows($blog_conn)>0){
                  
                  
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
										<img src=\"images/blog/$blog_img\" alt=\"#\">
									</div>
									<div class=\"news-body\">
										<div class=\"news-content\">
											<div class=\"date\">22 Aug, 2020</div>
											<h2><a href=\"view_blog.php?blog_id=$blog_id\">$blog_name</a></h2>
											<p class=\"text\">$blog_desc</p>
										</div>
									</div>
								</div>
								<!-- End Single Blog -->
							</div>";
							
						
					
						
    } ?>
    
    </div>
				
					<div class="table-bottom" style="margin: auto; display:block; margin-top:50px; color:#fff">
								<a class="btn" href="blog.php">View More Blogs</a>
							</div>
							
							<?php
    
              }
           
           else{
               
               echo"<h3 style=\"text-align:center;margin: auto;\"> No News or Blogs Found</h3>";
               
           }
           
    
    ?>
				
				
			</div>
			
			
		</section>
		<!-- End Blog Area -->