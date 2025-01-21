<?php

include('offline.php');


include('doctype.php');

?>

<head>
	  <meta name="description" content="Explore the pricing options for testing services offered by Taiyo Labs. Find affordable rates for quality control, laboratory analysis, diagnostic testing, and more.">
  <meta name="keywords" content="Taiyo Labs, Pricing, Testing services, Quality control, Laboratory analysis, Diagnostic testing, Rates">
  <title>Pricing - Taiyo Labs</title>
<?php

include('head.php');

?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>
   <style>
      #div_pagination{
      width:100%;
      margin-top:20px;
      margin-bottom:20px;
      text-align:center;
      }
      .button{
      border-radius:3px;
      border:0px;
      background-color:#1d293e;
      color:white;
      padding:10px 20px;
      letter-spacing: 1px;
      }
      .btn-primary2{
      color: #fff;
      background-color: #ef5e24;
      border-color: #ef5e24;
      }
   </style>
   <?php
      $rowperpage = 50;
      $row = 0;
      
      // Previous Button
      if(isset($_POST['but_prev'])){
          $row = $_POST['row'];
          $row -= $rowperpage;
          if( $row < 0 ){
              $row = 0;
          }
      }
      
      // Next Button
      if(isset($_POST['but_next'])){
          $row = $_POST['row'];
          $allcount = $_POST['allcount'];
      
          $val = $row + $rowperpage;
          if( $val < $allcount ){
              $row = $val;
          }
      }
      
      
      // count total number of rows
      $sql = "SELECT COUNT(*) AS cntrows FROM tests";
      $result = mysqli_query($conn,$sql);
      $fetchresult = mysqli_fetch_array($result);
      $allcount = $fetchresult['cntrows'];
      ?>
      
      
      
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
							<h2>Price Chart</h2>
							<ul class="bread-list">
								<li><a href="index.php">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Price Chart</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		
		<!-- Start Doctor Calendar Area -->
        <section class="doctor-calendar-area section">
            <div class="container">
                <div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Our Tests price Chart</h2>
							<img src="images/section.png" alt="#">
							<!--<p>For Price Chart For All Tests Click the Link Below to Download</p>
							
							<div class="get-quote2" style="margin-top: 20px;">
									<a href="price_chart.pdf" download class="btn"> Download Price Chart</a>
								</div> -->
						</div>
					</div>
				</div>
                	<div class="row" style="padding: 50px;">
									    
									    <div class="col-lg-3">
									        <h4 style="margin-top: 15px;"> Search Your Test : </h4>
									        </div>
									        
									        
									<div class="col-lg-9">
									
									      
									      <div class="form-group" style="margin: 10px;">
			
	
			
					<input type="text" name="search_text" id="search_text" placeholder="Search Your Required Test" class="form-control" />
			
			</div>
									      
									      
									
		  </div>
		  	  
									        
									</div>
										
			<br/>
			
				<div class="col-lg-12">
			<div id="result"></div>
		
		<div style="clear:both"></div>
			</div>
	<br><br>
						
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch2.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>

		<div class="row">
	
		  <div class="col-12">
						<div class="doctor-calendar-table table-responsive">
							<table class="table">
								<thead>
									<tr>
										
										<th>Test Name</th>
										<th>Test Category</th>
										<th>Amount</th>
									
									</tr>
								</thead>

								<tbody>
								
								
								<?php
								
								
								
								$price_fetch="SELECT * FROM tests ORDER BY RAND() limit 50";
								
								$price_f_conn=mysqli_query($conn,$price_fetch);
								
								while($row2=mysqli_fetch_assoc($price_f_conn)){
								    
								    $sno=$row2['id'];
								    
								    $test_name=$row2['tests'];
								    
								     $test_cat=$row2['category'];
								    
								    $amount=$row2['amount'];
								    
								    
								    echo "
								    	<tr>
								
										<td>
											<h3 class=\"tdp\" >$test_name</h3>
											
										</td>
										
										<td>
											<h3 class=\"tdp\" >$test_cat</h3>
											
										</td>
										
										<td class=\"tdp\">
											<h3 class=\"tdp\" ><i class=\"icofont-rupee\"></i> $amount</h3>
										
										</td>
										
									</tr>
";
								    
								}
								
								
								
								
?>

								
								
								
								
								

								</tbody>
							</table>
							
							 
						</div>
	
					</div>
                </div>
            </div>
        </section>
        <!-- End Doctor Calendar Area -->




<?php

include('footer.php');

?>

<?php

include('footerjs.php');

?>

    </body>

</html>

		