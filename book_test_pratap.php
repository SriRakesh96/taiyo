<?php

include('offline.php');


include('doctype.php');

?>

<head>
		<!-- Title -->
        <title>Taiyo Labs :: Book Test</title>	
<?php

include('head.php');

?>

<style>
    
    .forms {
        
        width: 100%;
       height:100px;
    overflow:scroll;
    border: 1px solid #eee;
    text-transform: capitalize;
    padding: 0px 18px;
    color: #555;
    font-size: 14px;
    font-weight: 400;
    border-radius: 4px;
    } 
    
  
 
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"/>

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
							<h2>Book Test</h2>
							<ul class="bread-list">
								<li><a href="index.php">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Book Test</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Start Contact Us -->
		<section class="contact-us section">
			<div class="container">
				<div class="inner">
					<div class="row"> 
						
						<div class="col-lg-12">
							<div class="contact-us-form">
								<h2>Book Test</h2>
							
								<!-- Form -->
								<form class="form" method="post" action="book_test_pro.php" name="contactus">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="name" id="name" placeholder="Name">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="email" name="email" id="email" placeholder="Email" >
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<input type="text" name="phone" id="phone" placeholder="Phone" >
											</div>
										</div>
											<div class="col-lg-6">
<div class="form-group">
									
 
										    	<select name="test" class="nice-select form-control wide" style="
    max-height: 200px;
   overflow:
    scroll;
">
										      <option selected="">Select Test</option><option value="ALANINE AMINOTRANSFERASE, SERUM (SGPT)">ALANINE AMINOTRANSFERASE, SERUM (SGPT)</option><option value="ALBUMIN, SERUM">ALBUMIN, SERUM</option><option value="ALBUMIN+GLOBULIN+A/G RATIO, SERUM">ALBUMIN+GLOBULIN+A/G RATIO, SERUM</option><option value="ALKALINE PHOSPHATASE, SERUM">ALKALINE PHOSPHATASE, SERUM</option><option value="ASPARTATE AMINOTRANSFERASE, SERUM (SGOT)">ASPARTATE AMINOTRANSFERASE, SERUM (SGOT)</option><option value="BILIRUBIN (TOTAL, DIRECT, INDIRECT), SER">BILIRUBIN (TOTAL, DIRECT, INDIRECT), SER</option><option value="BILIRUBIN, DIRECT, SERUM">BILIRUBIN, DIRECT, SERUM</option><option value="BILIRUBIN, TOTAL, SERUM">BILIRUBIN, TOTAL, SERUM</option><option value="BLOOD UREA NITROGEN, SERUM">BLOOD UREA NITROGEN, SERUM</option><option value="CALCIUM, 24HRS URINE">CALCIUM, 24HRS URINE</option><option value="CALCIUM, SERUM">CALCIUM, SERUM</option><option value="CHLORIDE, 24HRS URINE">CHLORIDE, 24HRS URINE</option><option value="CHLORIDE, SERUM">CHLORIDE, SERUM</option><option value="CHOLESTEROL, SERUM">CHOLESTEROL, SERUM</option><option value="CREATINE KINASE (CPK), SERUM">CREATINE KINASE (CPK), SERUM</option><option value="CREATININE, SERUM">CREATININE, SERUM</option><option value="DIRECT LDL CHOLESTEROL, SERUM">DIRECT LDL CHOLESTEROL, SERUM</option><option value="ELECTROLYTES (NA/K/CL), 24HRS URINE">ELECTROLYTES (NA/K/CL), 24HRS URINE</option><option value="ELECTROLYTES (NA/K/CL), SERUM">ELECTROLYTES (NA/K/CL), SERUM</option><option value="GAMMA GLUTAMYL TRANSFERASE, SERUM">GAMMA GLUTAMYL TRANSFERASE, SERUM</option><option value="GLUCOSE CHALLENGE TEST">GLUCOSE CHALLENGE TEST</option><option value="GLUCOSE RANDOM, PLASMA">GLUCOSE RANDOM, PLASMA</option><option value="GLUCOSE RANDOM, PLASMA/URINE">GLUCOSE RANDOM, PLASMA/URINE</option><option value="GLUCOSE TOLERANCE TEST (GTT-2)">GLUCOSE TOLERANCE TEST (GTT-2)</option><option value="GLUCOSE, FASTING, PLASMA / URINE">GLUCOSE, FASTING, PLASMA / URINE</option><option value="GLUCOSE, POST-PRANDIAL, PLASMA/URINE">GLUCOSE, POST-PRANDIAL, PLASMA/URINE</option><option value="GLUCOSE, URINE">GLUCOSE, URINE</option><option value="GLYCOSYLATED HEMOGLOBIN, BLOOD">GLYCOSYLATED HEMOGLOBIN, BLOOD</option><option value="IRON + TIBC + % SATURATION">IRON + TIBC + % SATURATION</option><option value="LACTATE DEHYDROGENASE, SERUM (LDH)">LACTATE DEHYDROGENASE, SERUM (LDH)</option><option value="MAGNESIUM, 24HRS URINE">MAGNESIUM, 24HRS URINE</option><option value="MAGNESIUM, SERUM">MAGNESIUM, SERUM</option><option value="MICROALBUMINURIA, URINE">MICROALBUMINURIA, URINE</option><option value="PHOSPHORUS, 24HRS URINE">PHOSPHORUS, 24HRS URINE</option><option value="PHOSPHORUS, SERUM">PHOSPHORUS, SERUM</option><option value="POTASSIUM, SERUM">POTASSIUM, SERUM</option><option value="POTASSIUM, URINE">POTASSIUM, URINE</option><option value="PROTEIN, 24HRS URINE">PROTEIN, 24HRS URINE</option><option value="SODIUM, SERUM">SODIUM, SERUM</option><option value="SODIUM, URINE">SODIUM, URINE</option><option value="TOTAL IRON BINDING CAPACITY, SERUM">TOTAL IRON BINDING CAPACITY, SERUM</option><option value="TOTAL PROTEIN, CSF">TOTAL PROTEIN, CSF</option><option value="TOTAL PROTEIN, SERUM">TOTAL PROTEIN, SERUM</option><option value="TOTAL PROTEIN, SYNOVIAL FLUID">TOTAL PROTEIN, SYNOVIAL FLUID</option><option value="TOTAL PROTEIN,ALBUMIN,GLOBULIN, SERUM">TOTAL PROTEIN,ALBUMIN,GLOBULIN, SERUM</option><option value="TRIGLYCERIDES, SERUM">TRIGLYCERIDES, SERUM</option><option value="UREA NITROGEN, 24HRS URINE">UREA NITROGEN, 24HRS URINE</option><option value="URIC ACID, 24HRS URINE">URIC ACID, 24HRS URINE</option><option value="URIC ACID, SERUM">URIC ACID, SERUM</option><option value="D-DIMER">D-DIMER</option><option value="ABO GROUP &amp; RH TYPE">ABO GROUP &amp; RH TYPE</option><option value="A.E.C">A.E.C</option><option value="ACT PARTIAL THROMBO PLASTIN TIME(APTT),">ACT PARTIAL THROMBO PLASTIN TIME(APTT),</option><option value="BLEEDING TIME &amp; CLOTTING TIME, EDTA WHOL">BLEEDING TIME &amp; CLOTTING TIME, EDTA WHOL</option><option value="HAEMOGRAM (CBC+PS+ESR) EDTA WHOLE BLO">HAEMOGRAM (CBC+PS+ESR) EDTA WHOLE BLO</option><option value="CBP (CBC+PS)">CBP (CBC+PS)</option><option value="CBC">CBC</option><option value="COOMBS TEST, DIRECT, BLOOD">COOMBS TEST, DIRECT, BLOOD</option><option value="ERYTHRO SEDIMENTATION RATE, BLOOD">ERYTHRO SEDIMENTATION RATE, BLOOD</option><option value="HAEMOGLOBIN">HAEMOGLOBIN</option><option value="INDIRECT COOMBS TEST, SERUM">INDIRECT COOMBS TEST, SERUM</option><option value="LE CELL EXAMINATION, BLOOD">LE CELL EXAMINATION, BLOOD</option><option value="LEPRA SMEAR">LEPRA SMEAR</option><option value="MALARIAL PARASITE (M.P), EDTA WHOLE BLOO">MALARIAL PARASITE (M.P), EDTA WHOLE BLOO</option><option value="PERIPHERAL SMEAR EXAM, EDTA WHOLE BLOOD">PERIPHERAL SMEAR EXAM, EDTA WHOLE BLOOD</option><option value="PLATELET COUNT, EDTA WHOLE BLOOD">PLATELET COUNT, EDTA WHOLE BLOOD</option><option value="PROTHROMBIN TIME, PLASMA">PROTHROMBIN TIME, PLASMA</option><option value="RETICULOCYTE COUNT, EDTA WHOLE BLOOD">RETICULOCYTE COUNT, EDTA WHOLE BLOOD</option><option value="SICKLING TEST, BLOOD">SICKLING TEST, BLOOD</option><option value="WHITE CELL COUNT AND DIFFERENTIAL, EDTA">WHITE CELL COUNT AND DIFFERENTIAL, EDTA</option><option value="FINE NEEDLE ASPIRATION (CYTOLOGY SMEARS)">FINE NEEDLE ASPIRATION (CYTOLOGY SMEARS)</option><option value="GRAM STAIN">GRAM STAIN</option><option value="SMALL BIOPSY">SMALL BIOPSY</option><option value="ACID FAST BACILLI SMEAR">ACID FAST BACILLI SMEAR</option><option value="BLOOD CULTURE &amp; SUSCEPTIBILITY">BLOOD CULTURE &amp; SUSCEPTIBILITY</option><option value="CULTURE , SPUTUM SUSCEPTIBILITY">CULTURE , SPUTUM SUSCEPTIBILITY</option><option value="CULTURE, BODY FLUID + SUSCEPTIBILIT">CULTURE, BODY FLUID + SUSCEPTIBILIT</option><option value="CULTURE, URINE - ISOLATION &amp; IDENTIFICAT">CULTURE, URINE - ISOLATION &amp; IDENTIFICAT</option><option value="FUNGAL SMEAR">FUNGAL SMEAR</option><option value="GONOCOCCAL SMEAR">GONOCOCCAL SMEAR</option><option value="THROAT SWAB CULTURE + SUSCEPTIBILITY">THROAT SWAB CULTURE + SUSCEPTIBILITY</option><option value="TZANK SMEAR">TZANK SMEAR</option><option value="ANTISTREPTOLYSIN O, SERUM (ASO)">ANTISTREPTOLYSIN O, SERUM (ASO)</option><option value="C-REACTIVE PROTEIN, SERUM ">C-REACTIVE PROTEIN, SERUM </option><option value="DENGUE DUO RAPID SCREENING TEST">DENGUE DUO RAPID SCREENING TEST</option><option value="HEPATITIS B SURFACE ANTIGEN, SERUM">HEPATITIS B SURFACE ANTIGEN, SERUM</option><option value="HEPATITIS C ANTIBODIES">HEPATITIS C ANTIBODIES</option><option value="HIV ANTIBODIES, SERUM">HIV ANTIBODIES, SERUM</option><option value="RAPID TYPHI IGM">RAPID TYPHI IGM</option><option value="RHEUMATOID FACTOR, SERUM">RHEUMATOID FACTOR, SERUM</option><option value="SKIN TEST-MANTOUX">SKIN TEST-MANTOUX</option><option value="VDRL, SERUM">VDRL, SERUM</option><option value="WIDAL TEST, SERUM">WIDAL TEST, SERUM</option><option value="ANEMIA PROFILE I">ANEMIA PROFILE I</option><option value="ANEMIA PROFILE II">ANEMIA PROFILE II</option><option value="LIPID PROFILE">LIPID PROFILE</option><option value="FEVER PANEL">FEVER PANEL</option><option value="KIDNEY PANEL - 1">KIDNEY PANEL - 1</option><option value="KIDNEY PANEL - II">KIDNEY PANEL - II</option><option value="LIVER &amp; KIDNEY PROFILE">LIVER &amp; KIDNEY PROFILE</option><option value="LIVER FUNCTION PROFILE, SERUM">LIVER FUNCTION PROFILE, SERUM</option><option value="LIVER FUNCTION TEST (WITHOUT GGT)">LIVER FUNCTION TEST (WITHOUT GGT)</option><option value="Free T4">Free T4</option><option value="Free T3">Free T3</option><option value="Thyroid Panel - II (FT3+FT4+TSH)">Thyroid Panel - II (FT3+FT4+TSH)</option><option value="TSH">TSH</option><option value="Vitamin B12">Vitamin B12</option><option value="VITAMIN D (25-HYDROXY VITAMIN D)">VITAMIN D (25-HYDROXY VITAMIN D)</option><option value="FSH &amp; LH Evaluation">FSH &amp; LH Evaluation</option><option value="FSH">FSH</option><option value="LH">LH</option><option value="T3 + T4 + TSH">T3 + T4 + TSH</option><option value="Prolactin">Prolactin</option><option value="LH, FSH, Prolactin">LH, FSH, Prolactin</option><option value="Ferritin">Ferritin</option><option value="ALPHA FETOPROTEIN (AFP)">ALPHA FETOPROTEIN (AFP)</option><option value="CA 19 - 9 ">CA 19 - 9 </option><option value="CA 125">CA 125</option><option value="CARCINO EMBRYONIC ANTIGEN (CEA)">CARCINO EMBRYONIC ANTIGEN (CEA)</option><option value="BETA HCG (HUMAN CHORIONIC GONADOTROPIN)">BETA HCG (HUMAN CHORIONIC GONADOTROPIN)</option><option value="THYROGLOBULIN">THYROGLOBULIN</option><option value="ANTI TPO ANTIBODIES">ANTI TPO ANTIBODIES</option><option value="ANTI THYROGLOBULIN ANTIBODIES">ANTI THYROGLOBULIN ANTIBODIES</option><option value="PARATHYROID HORMONE">PARATHYROID HORMONE</option>								     
        
        


</select>
											</div>
											
											
									
										
										</div>
										<!--************************************  -->
										
																					<div class="col-lg-6">
<div class="form-group">
									
 
										    	<select name="tester"  id="select-state"   class="nice-select form-control wide" style="
    max-height: 200px;
   overflow:
    scroll;
">
										<!--      <option selected="">Select Test</option><option value="ALANINE AMINOTRANSFERASE, SERUM (SGPT)">ALANINE AMINOTRANSFERASE, SERUM (SGPT)</option><option value="ALBUMIN, SERUM">ALBUMIN, SERUM</option><option value="ALBUMIN+GLOBULIN+A/G RATIO, SERUM">ALBUMIN+GLOBULIN+A/G RATIO, SERUM</option><option value="ALKALINE PHOSPHATASE, SERUM">ALKALINE PHOSPHATASE, SERUM</option><option value="ASPARTATE AMINOTRANSFERASE, SERUM (SGOT)">ASPARTATE AMINOTRANSFERASE, SERUM (SGOT)</option><option value="BILIRUBIN (TOTAL, DIRECT, INDIRECT), SER">BILIRUBIN (TOTAL, DIRECT, INDIRECT), SER</option><option value="BILIRUBIN, DIRECT, SERUM">BILIRUBIN, DIRECT, SERUM</option><option value="BILIRUBIN, TOTAL, SERUM">BILIRUBIN, TOTAL, SERUM</option><option value="BLOOD UREA NITROGEN, SERUM">BLOOD UREA NITROGEN, SERUM</option><option value="CALCIUM, 24HRS URINE">CALCIUM, 24HRS URINE</option><option value="CALCIUM, SERUM">CALCIUM, SERUM</option><option value="CHLORIDE, 24HRS URINE">CHLORIDE, 24HRS URINE</option><option value="CHLORIDE, SERUM">CHLORIDE, SERUM</option><option value="CHOLESTEROL, SERUM">CHOLESTEROL, SERUM</option><option value="CREATINE KINASE (CPK), SERUM">CREATINE KINASE (CPK), SERUM</option><option value="CREATININE, SERUM">CREATININE, SERUM</option><option value="DIRECT LDL CHOLESTEROL, SERUM">DIRECT LDL CHOLESTEROL, SERUM</option><option value="ELECTROLYTES (NA/K/CL), 24HRS URINE">ELECTROLYTES (NA/K/CL), 24HRS URINE</option><option value="ELECTROLYTES (NA/K/CL), SERUM">ELECTROLYTES (NA/K/CL), SERUM</option><option value="GAMMA GLUTAMYL TRANSFERASE, SERUM">GAMMA GLUTAMYL TRANSFERASE, SERUM</option><option value="GLUCOSE CHALLENGE TEST">GLUCOSE CHALLENGE TEST</option><option value="GLUCOSE RANDOM, PLASMA">GLUCOSE RANDOM, PLASMA</option><option value="GLUCOSE RANDOM, PLASMA/URINE">GLUCOSE RANDOM, PLASMA/URINE</option><option value="GLUCOSE TOLERANCE TEST (GTT-2)">GLUCOSE TOLERANCE TEST (GTT-2)</option><option value="GLUCOSE, FASTING, PLASMA / URINE">GLUCOSE, FASTING, PLASMA / URINE</option><option value="GLUCOSE, POST-PRANDIAL, PLASMA/URINE">GLUCOSE, POST-PRANDIAL, PLASMA/URINE</option><option value="GLUCOSE, URINE">GLUCOSE, URINE</option><option value="GLYCOSYLATED HEMOGLOBIN, BLOOD">GLYCOSYLATED HEMOGLOBIN, BLOOD</option><option value="IRON + TIBC + % SATURATION">IRON + TIBC + % SATURATION</option><option value="LACTATE DEHYDROGENASE, SERUM (LDH)">LACTATE DEHYDROGENASE, SERUM (LDH)</option><option value="MAGNESIUM, 24HRS URINE">MAGNESIUM, 24HRS URINE</option><option value="MAGNESIUM, SERUM">MAGNESIUM, SERUM</option><option value="MICROALBUMINURIA, URINE">MICROALBUMINURIA, URINE</option><option value="PHOSPHORUS, 24HRS URINE">PHOSPHORUS, 24HRS URINE</option><option value="PHOSPHORUS, SERUM">PHOSPHORUS, SERUM</option><option value="POTASSIUM, SERUM">POTASSIUM, SERUM</option><option value="POTASSIUM, URINE">POTASSIUM, URINE</option><option value="PROTEIN, 24HRS URINE">PROTEIN, 24HRS URINE</option><option value="SODIUM, SERUM">SODIUM, SERUM</option><option value="SODIUM, URINE">SODIUM, URINE</option><option value="TOTAL IRON BINDING CAPACITY, SERUM">TOTAL IRON BINDING CAPACITY, SERUM</option><option value="TOTAL PROTEIN, CSF">TOTAL PROTEIN, CSF</option><option value="TOTAL PROTEIN, SERUM">TOTAL PROTEIN, SERUM</option><option value="TOTAL PROTEIN, SYNOVIAL FLUID">TOTAL PROTEIN, SYNOVIAL FLUID</option><option value="TOTAL PROTEIN,ALBUMIN,GLOBULIN, SERUM">TOTAL PROTEIN,ALBUMIN,GLOBULIN, SERUM</option><option value="TRIGLYCERIDES, SERUM">TRIGLYCERIDES, SERUM</option><option value="UREA NITROGEN, 24HRS URINE">UREA NITROGEN, 24HRS URINE</option><option value="URIC ACID, 24HRS URINE">URIC ACID, 24HRS URINE</option><option value="URIC ACID, SERUM">URIC ACID, SERUM</option><option value="D-DIMER">D-DIMER</option><option value="ABO GROUP &amp; RH TYPE">ABO GROUP &amp; RH TYPE</option><option value="A.E.C">A.E.C</option><option value="ACT PARTIAL THROMBO PLASTIN TIME(APTT),">ACT PARTIAL THROMBO PLASTIN TIME(APTT),</option><option value="BLEEDING TIME &amp; CLOTTING TIME, EDTA WHOL">BLEEDING TIME &amp; CLOTTING TIME, EDTA WHOL</option><option value="HAEMOGRAM (CBC+PS+ESR) EDTA WHOLE BLO">HAEMOGRAM (CBC+PS+ESR) EDTA WHOLE BLO</option><option value="CBP (CBC+PS)">CBP (CBC+PS)</option><option value="CBC">CBC</option><option value="COOMBS TEST, DIRECT, BLOOD">COOMBS TEST, DIRECT, BLOOD</option><option value="ERYTHRO SEDIMENTATION RATE, BLOOD">ERYTHRO SEDIMENTATION RATE, BLOOD</option><option value="HAEMOGLOBIN">HAEMOGLOBIN</option><option value="INDIRECT COOMBS TEST, SERUM">INDIRECT COOMBS TEST, SERUM</option><option value="LE CELL EXAMINATION, BLOOD">LE CELL EXAMINATION, BLOOD</option><option value="LEPRA SMEAR">LEPRA SMEAR</option><option value="MALARIAL PARASITE (M.P), EDTA WHOLE BLOO">MALARIAL PARASITE (M.P), EDTA WHOLE BLOO</option><option value="PERIPHERAL SMEAR EXAM, EDTA WHOLE BLOOD">PERIPHERAL SMEAR EXAM, EDTA WHOLE BLOOD</option><option value="PLATELET COUNT, EDTA WHOLE BLOOD">PLATELET COUNT, EDTA WHOLE BLOOD</option><option value="PROTHROMBIN TIME, PLASMA">PROTHROMBIN TIME, PLASMA</option><option value="RETICULOCYTE COUNT, EDTA WHOLE BLOOD">RETICULOCYTE COUNT, EDTA WHOLE BLOOD</option><option value="SICKLING TEST, BLOOD">SICKLING TEST, BLOOD</option><option value="WHITE CELL COUNT AND DIFFERENTIAL, EDTA">WHITE CELL COUNT AND DIFFERENTIAL, EDTA</option><option value="FINE NEEDLE ASPIRATION (CYTOLOGY SMEARS)">FINE NEEDLE ASPIRATION (CYTOLOGY SMEARS)</option><option value="GRAM STAIN">GRAM STAIN</option><option value="SMALL BIOPSY">SMALL BIOPSY</option><option value="ACID FAST BACILLI SMEAR">ACID FAST BACILLI SMEAR</option><option value="BLOOD CULTURE &amp; SUSCEPTIBILITY">BLOOD CULTURE &amp; SUSCEPTIBILITY</option><option value="CULTURE , SPUTUM SUSCEPTIBILITY">CULTURE , SPUTUM SUSCEPTIBILITY</option><option value="CULTURE, BODY FLUID + SUSCEPTIBILIT">CULTURE, BODY FLUID + SUSCEPTIBILIT</option><option value="CULTURE, URINE - ISOLATION &amp; IDENTIFICAT">CULTURE, URINE - ISOLATION &amp; IDENTIFICAT</option><option value="FUNGAL SMEAR">FUNGAL SMEAR</option><option value="GONOCOCCAL SMEAR">GONOCOCCAL SMEAR</option><option value="THROAT SWAB CULTURE + SUSCEPTIBILITY">THROAT SWAB CULTURE + SUSCEPTIBILITY</option><option value="TZANK SMEAR">TZANK SMEAR</option><option value="ANTISTREPTOLYSIN O, SERUM (ASO)">ANTISTREPTOLYSIN O, SERUM (ASO)</option><option value="C-REACTIVE PROTEIN, SERUM ">C-REACTIVE PROTEIN, SERUM </option><option value="DENGUE DUO RAPID SCREENING TEST">DENGUE DUO RAPID SCREENING TEST</option><option value="HEPATITIS B SURFACE ANTIGEN, SERUM">HEPATITIS B SURFACE ANTIGEN, SERUM</option><option value="HEPATITIS C ANTIBODIES">HEPATITIS C ANTIBODIES</option><option value="HIV ANTIBODIES, SERUM">HIV ANTIBODIES, SERUM</option><option value="RAPID TYPHI IGM">RAPID TYPHI IGM</option><option value="RHEUMATOID FACTOR, SERUM">RHEUMATOID FACTOR, SERUM</option><option value="SKIN TEST-MANTOUX">SKIN TEST-MANTOUX</option><option value="VDRL, SERUM">VDRL, SERUM</option><option value="WIDAL TEST, SERUM">WIDAL TEST, SERUM</option><option value="ANEMIA PROFILE I">ANEMIA PROFILE I</option><option value="ANEMIA PROFILE II">ANEMIA PROFILE II</option><option value="LIPID PROFILE">LIPID PROFILE</option><option value="FEVER PANEL">FEVER PANEL</option><option value="KIDNEY PANEL - 1">KIDNEY PANEL - 1</option><option value="KIDNEY PANEL - II">KIDNEY PANEL - II</option><option value="LIVER &amp; KIDNEY PROFILE">LIVER &amp; KIDNEY PROFILE</option><option value="LIVER FUNCTION PROFILE, SERUM">LIVER FUNCTION PROFILE, SERUM</option><option value="LIVER FUNCTION TEST (WITHOUT GGT)">LIVER FUNCTION TEST (WITHOUT GGT)</option><option value="Free T4">Free T4</option><option value="Free T3">Free T3</option><option value="Thyroid Panel - II (FT3+FT4+TSH)">Thyroid Panel - II (FT3+FT4+TSH)</option><option value="TSH">TSH</option><option value="Vitamin B12">Vitamin B12</option><option value="VITAMIN D (25-HYDROXY VITAMIN D)">VITAMIN D (25-HYDROXY VITAMIN D)</option><option value="FSH &amp; LH Evaluation">FSH &amp; LH Evaluation</option><option value="FSH">FSH</option><option value="LH">LH</option><option value="T3 + T4 + TSH">T3 + T4 + TSH</option><option value="Prolactin">Prolactin</option><option value="LH, FSH, Prolactin">LH, FSH, Prolactin</option><option value="Ferritin">Ferritin</option><option value="ALPHA FETOPROTEIN (AFP)">ALPHA FETOPROTEIN (AFP)</option><option value="CA 19 - 9 ">CA 19 - 9 </option><option value="CA 125">CA 125</option><option value="CARCINO EMBRYONIC ANTIGEN (CEA)">CARCINO EMBRYONIC ANTIGEN (CEA)</option><option value="BETA HCG (HUMAN CHORIONIC GONADOTROPIN)">BETA HCG (HUMAN CHORIONIC GONADOTROPIN)</option><option value="THYROGLOBULIN">THYROGLOBULIN</option><option value="ANTI TPO ANTIBODIES">ANTI TPO ANTIBODIES</option><option value="ANTI THYROGLOBULIN ANTIBODIES">ANTI THYROGLOBULIN ANTIBODIES</option><option value="PARATHYROID HORMONE">PARATHYROID HORMONE</option>								     
        
-->


    <option value="">Select a state...</option>
    <option value="AL">LabOne</option>
    <option value="AK">Hero</option>
    <option value="AZ">Alaska</option>
    <option value="AR">Opinion</option>
    <option value="CA">California</option>
    <option value="CO">Hyderabad</option>



</select>

 <script type="text/javascript">
          $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
    </script>
											</div>
											
											
									
										
										</div>
										
											<!--************************************  -->
										
										<div class="col-lg-6">
											<div class="form-group">
												<textarea name="message" id="message" placeholder="Your Message" ></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group login-btn">
												<button class="btn" type="submit">Book Now</button>
											</div>
										
										</div>
									</div>
								</form>
								<!--/ End Form -->
							</div>
						</div>
					</div>
				</div>
				
				
				   <script  type="text/javascript">
      var frmvalidator = new Validator("contactus");
      
      frmvalidator.addValidation("name","req","Enter Your Name");
      
      
      frmvalidator.addValidation("email","maxlen=50");
      frmvalidator.addValidation("email","req","Enter Your Email");
      
      
      frmvalidator.addValidation("phone","req","Enter Your Phone Number");
      
      
      frmvalidator.addValidation("message","req","Enter Your Message");
      
      frmvalidator.addValidation("message","maxlen=500","Maximum message length is 500");
       
      
   </script>
   

    
    

			</div>
		</section>
		<!--/ End Contact Us -->




<?php

include('footer.php');

?>

<?php

include('footerjs.php');

?>

    </body>

</html>

