<?php
   include('offline.php');
   
   include('doctype.php');
   
   ?>
<head>
   <meta name="description" content="Explore the health packages offered by Taiyo Labs for comprehensive testing and analysis. Choose from a variety of packages tailored to meet your health and wellness needs.">
   <meta name="keywords" content="Taiyo Labs, Health Packages, Health and Wellness, Testing packages, Diagnostic packages, Health screening">
   <title>Health Packages - Taiyo Labs</title>
   <?php
      include('head.php');
      
      ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
   <!--       <div class="preloader">-->
   <!--           <div class="loader">-->
   <!--               <div class="loader-outter"></div>-->
   <!--               <div class="loader-inner"></div>-->
   <!--               <div class="indicator"> -->
   <!--                   <svg width="16px" height="12px">-->
   <!--                       <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>-->
   <!--                       <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>-->
   <!--                   </svg>-->
   <!--               </div>-->
   <!--           </div>-->
   <!--       </div>-->
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
                  <h2>Health Package</h2>
                  <ul class="bread-list">
                     <li><a href="index.php">Home</a></li>
                     <li><i class="icofont-simple-right"></i></li>
                     <li class="active">Health Package</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Breadcrumbs -->
   <!-- Pricing Table -->
   <section class="pricing-table section">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section-title">
                  <h2>Health Packages</h2>
                  <img src="images/section.png" alt="#">
               </div>
            </div>
         </div>
         <div class="row">
           <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
               <div class="single-table">
                  <!-- Table Head -->
                  <div class="table-head">
                     <h4 class="title">ALCOHOL DETOX CARE</h4>
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
                        <li><i class="icofont icofont-ui-check"></i> Ð¡Ð’Ð¡</li>
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
            
            
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
               <div class="single-table">
                  <!-- Table Head -->
                  <div class="table-head">
                     <h4 class="title">METABOLIC STRESS CARE</h4>
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 7500<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 2999<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (17)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> HbA1c</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        <li><i class="icofont icofont-ui-check"></i> Vitamin-B12</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid Profile</li>
                        <li><i class="icofont icofont-ui-check"></i> Vitamin-D</li>
                        <li><i class="icofont icofont-ui-check"></i> Thyroid</li>
                        <li><i class="icofont icofont-ui-check"></i> HBa1C</li>
                        <li><i class="icofont icofont-ui-check"></i> Ultrasound</li>
                        
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=13">Book Now</a>
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
                     <h4 class="title">OBESITY PACKAGE</h4>
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 2500<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 999<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (42)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> HBa1C</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid Profile</li>
                        <li><i class="icofont icofont-ui-check"></i> Liver</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> Thyroid</li>
                        
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=14">Book Now</a>
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
                     <h4 class="title">YOUNG MALE Test Package</h4>
                     <div class="price">
                         <h5 class="body">ADVANCE PACKAGE</h5>
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 4000<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 1599<span>/-</span></p>
                     </div>
                     <div class="price">
                         <h5 class="body">BASIC PACKAGE</h5>
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 2500<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 999<span>/-</span></p>
                     </div>
                     
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (54)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> Liver</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        <li><i class="icofont icofont-ui-check"></i> Vitamin-D</li>
                        <li><i class="icofont icofont-ui-check"></i> Thyroid</li>
                        <li><i class="icofont icofont-ui-check"></i> Uric Acid</li>
                        <li><i class="icofont icofont-ui-check"></i> CUE</li>
                        <li><i class="icofont icofont-ui-check"></i> Urine Routine</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> Total Cholesterol</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid Profile</li>
                        <li><i class="icofont icofont-ui-check"></i> SGPT</li>
                        
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=8">Book Now</a>
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
                     <h4 class="title">YOUNG FEMALE Test Package</h4>
                     <div class="price">
                         <h5 class="body">ADVANCE PACKAGE</h5>
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 4000<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 1599<span>/-</span></p>
                     </div>
                     <div class="price">
                         <h5 class="body">BASIC PACKAGE</h5>
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 2500<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 999<span>/-</span></p>
                     </div>
                     
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (67)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> Prolactin</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        <li><i class="icofont icofont-ui-check"></i> Vitamin-D</li>
                        <li><i class="icofont icofont-ui-check"></i> Thyroid</li>
                        <li><i class="icofont icofont-ui-check"></i> Uric Acid</li>
                        <li><i class="icofont icofont-ui-check"></i> CUE</li>
                        <li><i class="icofont icofont-ui-check"></i> Urine Routine</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> Total Cholesterol</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid Profile</li>
                        <li><i class="icofont icofont-ui-check"></i> SGPT</li>
                        <li><i class="icofont icofont-ui-check"></i> HbA1c</li>
                        
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=9">Book Now</a>
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
                     <h4 class="title">MIDDLE AGED MALE Test Package</h4>
                     <div class="price">
                         <h5 class="body">ADVANCE PACKAGE</h5>
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 10000<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 3999<span>/-</span></p>
                     </div>
                     <div class="price">
                         <h5 class="body">BASIC PACKAGE</h5>
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 2500<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 999<span>/-</span></p>
                     </div>
                     
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (71)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> Liver</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        <li><i class="icofont icofont-ui-check"></i> Vitamin-D</li>
                        <li><i class="icofont icofont-ui-check"></i> Calcium</li>
                        <li><i class="icofont icofont-ui-check"></i> CBC</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid Profile</li>
                        <li><i class="icofont icofont-ui-check"></i> Uric Acid</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> Total Cholesterol</li>
                        <li><i class="icofont icofont-ui-check"></i> ECG</li>
                        <li><i class="icofont icofont-ui-check"></i> SGPT</li>
                        </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=12">Book Now</a>
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
                     <h4 class="title">MIDDLE AGED FEMALE Test Package</h4>
                     <div class="price">
                         <h5 class="body">ADVANCE PACKAGE</h5>
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 10000<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 3999<span>/-</span></p>
                     </div>
                     <div class="price">
                         <h5 class="body">BASIC PACKAGE</h5>
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 2500<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 999<span>/-</span></p>
                     </div>
                     
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Include Parameters (58)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> ECG</li>
                        <li><i class="icofont icofont-ui-check"></i> Blood Sugar</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> PAP-SMEAR</li>
                        <li><i class="icofont icofont-ui-check"></i> Urine Examination</li>
                        <li><i class="icofont icofont-ui-check"></i> Iron</li>
                        <li><i class="icofont icofont-ui-check"></i> Liver</li>
                        <li><i class="icofont icofont-ui-check"></i> Total Cholesterol</li>
                        <li><i class="icofont icofont-ui-check"></i> Vitamin-D</li>
                        <li><i class="icofont icofont-ui-check"></i> SGPT</li>
                        <li><i class="icofont icofont-ui-check"></i> §³§£§³</li>
                        <li><i class="icofont icofont-ui-check"></i> Calcium</li>
                        </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=11">Book Now</a>
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
                     <h2 class="title">Taiyo Aarush Mini</h2>
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 910<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 599<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Tests Include (5 Tests)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> FBS, CBC</li>
                        <li><i class="icofont icofont-ui-check"></i> TSH</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid profile</li>
                        <li><i class="icofont icofont-ui-check"></i> HB %</li>
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=1">Book Now</a>
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
                     <h4 class="title">Taiyo Aarush</h4>
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 2200<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 1099<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Tests Include (6 Tests)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> FBS, CBS</li>
                        <li><i class="icofont icofont-ui-check"></i>TFT</li>
                        <li><i class="icofont icofont-ui-check"></i>RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid profile</li>
                        <li><i class="icofont icofont-ui-check"></i> LFT</li>
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=2">Book Now</a>
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
                     <h4 class="title">Taiyo Aarush Essential</h4>
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 3000<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 1499<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Tests Include (7 Tests)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> FBS</li>
                        <li><i class="icofont icofont-ui-check"></i> TFT</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> HbA1C</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid profile</li>
                        <li><i class="icofont icofont-ui-check"></i> LFT</li>
                        <li><i class="icofont icofont-ui-check"></i> TFT</li>
                        <li><i class="icofont icofont-ui-check"></i>  CBP</li>
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=3">Book Now</a>
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
                     <h4 class="title">Taiyo Aarush Plus</h4>
                     <div class="price">
                        <p class="amount2">MRP : <i class="icofont-rupee"></i> 6000<span>/-</span></p>
                        <p class="amount2 blink">Offer Price : <i class="icofont-rupee"></i> 3499<span>/-</span></p>
                     </div>
                  </div>
                  <!-- Table List -->
                  <h3 class="title2">Tests Include (11 Tests)</h3>
                  <div class="wrapper">
                     <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i> FBS</li>
                        <li><i class="icofont icofont-ui-check"></i> CBS</li>
                        <li><i class="icofont icofont-ui-check"></i> TFT</li>
                        <li><i class="icofont icofont-ui-check"></i> RFT</li>
                        <li><i class="icofont icofont-ui-check"></i> VIT-D</li>
                        <li><i class="icofont icofont-ui-check"></i> CUE ECG</li>
                        <li><i class="icofont icofont-ui-check"></i> Ultra Sound(USG)</li>
                        <li><i class="icofont icofont-ui-check"></i> Lipid profile</li>
                        <li><i class="icofont icofont-ui-check"></i> LFT</li>
                        <li><i class="icofont icofont-ui-check"></i> VIT-B12</li>
                     </ul>
                     <button id="next" class="next" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">+ Show More</button>
                     <button id="less" class="less" style="color: #fff; padding: 10px;font-size: 14px; /* text-transform: capitalize; */ font-weight: 500; background: #ed9e52; position: relative; box-shadow: none; display: inline-block;-webkit-transition: all 0.4s ease; -moz-transition: all 0.4s ease;transition: all 0.4s ease;-webkit-transform: perspective(1px) translateZ(0); transform: perspective(1px) translateZ(0);border: none; border-radius: 0;border-radius: 4px;">- Show Less</button>
                  </div>
                  <div class="table-bottom">
                     <a class="btn" href="view_details.php?test=4">Book Now</a>
                  </div>
                  <!-- Table Bottom -->
               </div>
            </div>
            <!-- End Single Table-->
            
            
            
            
            
          
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
   <?php
      include('footer.php');
      
      ?>
   <?php
      include('footerjs.php');
      
      ?>
</body>
</html>