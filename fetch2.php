<?php
session_start();

error_reporting(E_ERROR | E_PARSE);

include('offline.php');



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
     
     .tdp {
         
          padding: 30px;
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
<?php

$output = '';

$test=$_POST["query"];

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "SELECT * FROM tests WHERE tests LIKE '%".$search."%' AND act='1'";
}
else
{
	$query = "
	SELECT * FROM tests WHERE tests='$test' AND act='1' ORDER BY id ASC limit $row,".$rowperpage;
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
	?>
	
             <section class="doctor-calendar-area">
            <div class="container">
                
                <div class="row">
					<div class="col-12">
						<h4 style="margin:10px;"> Search Results</h4>
						<div class="doctor-calendar-table table-responsive">
						
							<table class="table">
								<thead>
									<tr>
									
										<th style="width: 50%;">Test Name</th>
										<th  style="width: 50%;">Test Category</th>
										<th style="width: 50%;">Amount</th>
									
									</tr>
								</thead>
					    <?php
	while($row = mysqli_fetch_array($result))
	{
	    
	    ?>
	    
	    

							<tbody>
								
							
							
								    	<tr>
									
										<td>
											<h3 class="tdp"><?php echo $row['tests']; ?></h3>
											
										</td>
											<td>
											<h3 class="tdp"><?php echo $row['category']; ?></h3>
											
										</td>
										
										<td>
											<h3 class="tdp"><i class="icofont-rupee"></i><?php echo $row['amount']; ?></h3>
										
										</td>
										
									</tr>


								</tbody>
						

				
				<?php
	
	}
	
	?>
	
		</table>
							
							 
						</div>
					
					</div>
                </div>
				
			</div>
        </section>
        <!-- End Doctor Calendar Area -->
        
        <?php

}

?>