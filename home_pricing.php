	<head>
	    <style>
      .html,  .php {
      width: 50%;
      display:block;
      margin: 0 auto;
      list-style-type: none;
      float:left;
      overflow:hidden;
      }
      .html ul, .php ul {   
      list-style-type: none;   
      text-align:center;     
      }
      .html li, .php li {
      padding-right: 10px;
      padding-bottom: 20px;
      }
      
      @keyframes blink {
        20% { opacity: 0; }
    }
    .blink {
        animation: blink 1s linear infinite;
        color: red; /* Change text color to red */
    }
   </style>
</head>
	    
	
	<!-- Pricing Table -->
		<section class="pricing-table">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title2">
							<h2>Health Packages</h2>
							<img src="images/section.png" alt="#">
					
						</div>
					</div>
				</div>
				
					<div class="row" style="padding: 50px;">
									    
									    <div class="col-lg-3">
									        <h4 style="margin-top: 15px;"> Search Test : </h4>
									        </div>
									        
									        
									<div class="col-lg-9">
									
									      
									      <div class="form-group" style="margin: 10px;">
			
	
			
					<input type="text" name="search_text" id="search_text" placeholder="Search Required Test" class="form-control" />
			
			</div>
									      
									      
									
		  </div>
		  	  
									        
									</div>
										
			<br/>
			
				<div class="col-lg-12">
			<div id="result"></div>
		
		<div style="clear:both"></div>
			</div>							
									
						
									
					
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
           <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
               <div class="single-table">
                  <!-- Table Head -->
                  <div class="table-head">
                     <h4 class="title">Alcohol Detox Care</h4>
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 9000<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 3500<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (51)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> Pulmonary Function Test</li>
                        <li><i class="icofont icofont-ui-check"></i> Uric Acid</li>
                        <li><i class="icofont icofont-ui-check"></i> X-ray Chest</li>
                        <li><i class="icofont icofont-ui-check"></i> Calcium</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> CBC</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        
                        <li><i class="icofont icofont-ui-check"></i> NH3 (Ammonia)</li>
                        <li><i class="icofont icofont-ui-check"></i> Urine Examination</li>
                        <li><i class="icofont icofont-ui-check"></i> VIT-B12</li>
                        
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=6">Book Now</a>
                  </div>
                  <!-- Table Bottom -->
               </div>
            </div>
            <!-- End Single Table-->
            
            
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
               <div class="single-table">
                  <!-- Table Head -->
                  <div class="table-head">
                     <h4 class="title">HAIR FALL PACKAGE(MEN / WOMEN)</h4>
                     
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 2500<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 999<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (21)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> Ferritin</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        <li><i class="icofont icofont-ui-check"></i> Vitamin-D</li>
                        <li><i class="icofont icofont-ui-check"></i> Thyroid</li>
                        <li><i class="icofont icofont-ui-check"></i> Calcium</li>
                        <li><i class="icofont icofont-ui-check"></i> Iron</li>
                        
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=7">Book Now</a>
                  </div>
                  <!-- Table Bottom -->
               </div>
            </div>
            <!-- End Single Table-->
            
            
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
               <div class="single-table">
                  <!-- Table Head -->
                  <div class="table-head">
                     <h4 class="title">SMOKERS DETOX CARE</h4>
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 12500<span>/-</span></p>
                        <p class="amount2  blink">Offer Price : <i class="icofont-rupee"></i> 5000<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (43)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> Pulmonary Function Test</li>
                        <li><i class="icofont icofont-ui-check"></i> Uric Acid</li>
                        <li><i class="icofont icofont-ui-check"></i> X-ray Chest</li>
                        <li><i class="icofont icofont-ui-check"></i> Calcium</li>
                        <li><i class="icofont icofont-ui-check"></i> 小袙小</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> Liver</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        <li><i class="icofont icofont-ui-check"></i> Vitamin-B12</li>
                        <li><i class="icofont icofont-ui-check"></i> Ultrasound</li>
                        <li><i class="icofont icofont-ui-check"></i> NH-3 (Ammonia)</li>
                        <li><i class="icofont icofont-ui-check"></i> UrineExamination</li>
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=10">Book Now</a>
                  </div>
                  <!-- Table Bottom -->
               </div>
            </div>
            <!-- End Single Table-->
					
					
		
					<div class="table-bottom" style="margin: auto; display:block;">
								<a class="btn" href="health_package.php">View More Packages</a>
							</div>
			  
					
			<script>
			    
			    $(document).ready(function(){
        
        var numToShow = 3;
        $(".table-list li").hide();
        $('.wrapper ul').each(function(){
           var list = $(this).children("li");
           var button = $(this).siblings(".next");
           var less = $(this).siblings('.less');
           var numInList = list.length;
           if (numInList > numToShow) {
              button.show();
              less.hide();
           }
          //$(this).children("li:lt('+ numToShow +')").show();
          list.slice(0, numToShow).show();
        });
        
        $('button.next').click(function(){
          var list = $(this).siblings(".table-list").children("li");
          var numInList = list.length;
          var showing = list.filter(':visible').length;
          list.slice(showing - 1, showing + numToShow).fadeIn();
          var nowShowing = list.filter(':visible').length;
          if (nowShowing >= numInList) {
            $(this).hide();
            $(this).next('button.less').show();
          }
        });

        $('button.less').click(function () {
          $(this).siblings(".table-list").children("li").not(':lt(3)').hide();
          $(this).siblings('button.next').show();
          $(this).hide();
        });
        
    });
    
			</script>		
					
					
				</div>	
				
			
						
						
			</div>	
		</section>	
		<!--/ End Pricing Table -->
		