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

.section {
    padding: 20px 0;
}
    
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
    
    .contact-us .inner{
        box-shadow:none;
    }
    
   input[disabled] {
        background-color:#e4e4e4;
    }
 
</style>
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






		<!-- Start Contact Us -->
		<section class="contact-us section">
			<div class="container">
				<div class="inner">
					<div class="row"> 
					<div class="col-lg-2">	
					</div>
						<div class="col-lg-8">
							<div class="contact-us-form">
								<h2>Book Test</h2>
							
<form class="form" method="post" action="book_test_pro.php" name="contactus">
    <?php
    $test_id = $_GET['test'];
    $fetch_test = "SELECT * FROM test_packages WHERE test_id='$test_id'";
    $fetch_tquery = mysqli_query($conn, $fetch_test);
    while ($row3 = mysqli_fetch_assoc($fetch_tquery)) {
        $test_name = $row3['package_name'];
    }
    ?>
    <input type="hidden" name="test" value="<?php echo $test_name; ?>">
    <div class="row">
         <div class="col-lg-12">
            <div class="form-group">
                <label>Selected Test Name</label>
                <input type="text"  value="<?php echo $test_name; ?>" disabled>
              
            </div>
        </div>
        
        
        
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="name" placeholder="Name*">
                <span class="error-message" id="name-error"></span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email*">
                <span class="error-message" id="email-error"></span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <input type="text" name="phone" placeholder="Phone*" class="phone-number">
                <span class="error-message" id="phone-error"></span>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <textarea name="address" placeholder="Address*"></textarea>
                <span class="error-message" id="address-error"></span>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group login-btn">
                <button class="btn" type="submit" onclick="return validateForm()">Book Now</button>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function validateForm() {
        var isValid = true;

        // Validate name
        var name = $("input[name='name']").val();
        if (name == "") {
            $("#name-error").text("Please enter your name").css('color', 'red');
            isValid = false;
        } else {
            $("#name-error").text("");
        }

        // Validate email
        var email = $("input[name='email']").val();
        if (email == "") {
            $("#email-error").text("Please enter your email").css('color', 'red');
            isValid = false;
        } else {
            $("#email-error").text("");
        }

        // Validate phone number
        var phone = $("input[name='phone']").val();
        if (phone == "") {
            $("#phone-error").text("Please enter your phone number").css('color', 'red');
            isValid = false;
        } else {
            $("#phone-error").text("");
        }

        // Validate address
        var address = $("textarea[name='address']").val();
        if (address == "") {
            $("#address-error").text("Please enter your address").css('color', 'red');
            isValid = false;
        } else {
            $("#address-error").text("");
        }

        return isValid;
    }

    $(document).ready(function () {
        // Phone number validation
        $('.phone-number').on('input', function () {
            var input = $(this);
            input.val(input.val().replace(/\D/g, '')); // Remove non-numeric characters
        });
    });
</script>


							</div>
						</div>
						
						<div class="col-lg-2">	
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
   
	<script>
   	var ddlItem = document.getElementById("ddlitemslis"),
       itemArray = ["ALANINE AMINOTRANSFERASE"," SERUM (SGPT)","ALBUMIN"," SERUM","ALBUMIN+GLOBULIN+A/G RATIO"," SERUM","ALKALINE PHOSPHATASE"," SERUM","ASPARTATE AMINOTRANSFERASE"," SERUM (SGOT)","BILIRUBIN (TOTAL"," DIRECT"," INDIRECT)"," SER","BILIRUBIN"," DIRECT"," SERUM","BILIRUBIN"," TOTAL"," SERUM","BLOOD UREA NITROGEN"," SERUM","CALCIUM"," 24HRS URINE","CALCIUM"," SERUM","CHLORIDE"," 24HRS URINE","CHLORIDE"," SERUM","CHOLESTEROL"," SERUM","CREATINE KINASE (CPK)"," SERUM","CREATININE"," SERUM","DIRECT LDL CHOLESTEROL"," SERUM","ELECTROLYTES (NA/K/CL)"," 24HRS URINE","ELECTROLYTES (NA/K/CL)"," SERUM","GAMMA GLUTAMYL TRANSFERASE"," SERUM","GLUCOSE CHALLENGE TEST","GLUCOSE RANDOM"," PLASMA","GLUCOSE RANDOM"," PLASMA/URINE","GLUCOSE TOLERANCE TEST (GTT-2)","GLUCOSE"," FASTING"," PLASMA / URINE","GLUCOSE"," POST-PRANDIAL"," PLASMA/URINE","GLUCOSE"," URINE","GLYCOSYLATED HEMOGLOBIN"," BLOOD","IRON + TIBC + % SATURATION","LACTATE DEHYDROGENASE"," SERUM (LDH)","MAGNESIUM"," 24HRS URINE","MAGNESIUM"," SERUM","MICROALBUMINURIA"," URINE","PHOSPHORUS"," 24HRS URINE","PHOSPHORUS"," SERUM","POTASSIUM"," SERUM","POTASSIUM"," URINE","PROTEIN"," 24HRS URINE","SODIUM"," SERUM","SODIUM"," URINE","TOTAL IRON BINDING CAPACITY"," SERUM","TOTAL PROTEIN"," CSF","TOTAL PROTEIN"," SERUM","TOTAL PROTEIN"," SYNOVIAL FLUID","TOTAL PROTEIN","ALBUMIN","GLOBULIN"," SERUM","TRIGLYCERIDES"," SERUM","UREA NITROGEN"," 24HRS URINE","URIC ACID"," 24HRS URINE","URIC ACID"," SERUM","D-DIMER","ABO GROUP & RH TYPE","A.E.C","ACT PARTIAL THROMBO PLASTIN TIME(APTT)","","BLEEDING TIME & CLOTTING TIME"," EDTA WHOL","HAEMOGRAM (CBC+PS+ESR) EDTA WHOLE BLO","CBP (CBC+PS)","CBC","COOMBS TEST"," DIRECT"," BLOOD","ERYTHRO SEDIMENTATION RATE"," BLOOD","HAEMOGLOBIN","INDIRECT COOMBS TEST"," SERUM","LE CELL EXAMINATION"," BLOOD","LEPRA SMEAR","MALARIAL PARASITE (M.P)"," EDTA WHOLE BLOO","PERIPHERAL SMEAR EXAM"," EDTA WHOLE BLOOD","PLATELET COUNT"," EDTA WHOLE BLOOD","PROTHROMBIN TIME"," PLASMA","RETICULOCYTE COUNT"," EDTA WHOLE BLOOD","SICKLING TEST"," BLOOD","WHITE CELL COUNT AND DIFFERENTIAL"," EDTA","FINE NEEDLE ASPIRATION (CYTOLOGY SMEARS)","GRAM STAIN","SMALL BIOPSY","ACID FAST BACILLI SMEAR","BLOOD CULTURE & SUSCEPTIBILITY","CULTURE "," SPUTUM SUSCEPTIBILITY","CULTURE"," BODY FLUID + SUSCEPTIBILIT","CULTURE"," URINE - ISOLATION & IDENTIFICAT","FUNGAL SMEAR","GONOCOCCAL SMEAR","THROAT SWAB CULTURE + SUSCEPTIBILITY","TZANK SMEAR","ANTISTREPTOLYSIN O"," SERUM (ASO)","C-REACTIVE PROTEIN"," SERUM ","DENGUE DUO RAPID SCREENING TEST","HEPATITIS B SURFACE ANTIGEN"," SERUM","HEPATITIS C ANTIBODIES","HIV ANTIBODIES"," SERUM","RAPID TYPHI IGM","RHEUMATOID FACTOR"," SERUM","SKIN TEST-MANTOUX","VDRL"," SERUM","WIDAL TEST"," SERUM","ANEMIA PROFILE I","ANEMIA PROFILE II","LIPID PROFILE","FEVER PANEL","KIDNEY PANEL - 1","KIDNEY PANEL - II","LIVER & KIDNEY PROFILE","LIVER FUNCTION PROFILE"," SERUM","LIVER FUNCTION TEST (WITHOUT GGT)","Free T4","Free T3","Thyroid Panel - II (FT3+FT4+TSH)","TSH","Vitamin B12","VITAMIN D (25-HYDROXY VITAMIN D)","FSH & LH Evaluation","FSH","LH","T3 + T4 + TSH","Prolactin","LH"," FSH"," Prolactin","Ferritin","ALPHA FETOPROTEIN (AFP)","CA 19 - 9 ","CA 125","CARCINO EMBRYONIC ANTIGEN (CEA)","BETA HCG (HUMAN CHORIONIC GONADOTROPIN)","THYROGLOBULIN","ANTI TPO ANTIBODIES","ANTI THYROGLOBULIN ANTIBODIES","PARATHYROID HORMONE"];
       
       
       for (var a = 0; a < itemArray.length; a++) {
         var op = itemArray[a];
         var e = document.createElement("option");
         e.textContent = op;
         e.value = op;
         ddlItem.appendChild(e);
       }
   
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

