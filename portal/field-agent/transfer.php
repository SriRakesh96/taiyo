<?php
include('offline.php');

if (!empty($_COOKIE['fagn_email']) && !empty($_COOKIE['fagn_password'])) {
    $cookie_email = $_COOKIE['fagn_email'];
    $cookie_password = $_COOKIE['fagn_password'];

    $user_data = "SELECT * FROM taiyo_fagent WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $ename = $row6['name'];
        $branch = $row6['branch'];
          $branchn = $row6['branch_name'];
    }

    include('doctype.php');
?>
<head>


<title><?php echo $type; ?> </title>

<?php

include('head.php');


?>


</head>

<body>


   <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
	
	

<?php

include('header.php');


?>
<?php

include('home_sidebar.php');


?>

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
				
                <!-- row -->
                <div class="row">
                <div class="col-lg-12">
               
                 
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transfer Booking</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                   
                                   
                            <?php
$patient_id = $_GET['pat_id'];
?>

<form action="transfer_pro" method="POST">
    <div class="form-row">
        <input type="hidden" name="pat_id" value="<?php echo $patient_id; ?>">

        <!-- Agent Dropdown -->
        <div class="form-group col-md-6">
            <label for="agent_id">Select Agent</label>
            <select class="form-control" id="agent_id" name="agent_id" required>
                <option value="">Select Agent</option>
                <?php
                // Fetch all active agents for the same branch
                $agent_query = "SELECT * FROM taiyo_fagent WHERE access_id != '$access_id' AND branch='$branch' AND act=1";
                $agent_result = mysqli_query($conn, $agent_query);

                // Check if agents are available
                $agents_available = mysqli_num_rows($agent_result) > 0;

                // Populate the dropdown with agent names
                if ($agents_available) {
                    while ($row = mysqli_fetch_assoc($agent_result)) {
                        echo "<option value='" . htmlspecialchars($row['access_id'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</option>";
                    }
                } else {
                    echo "<option value=''>No agents available</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group col-md-6">
        </div>

        <!-- Submit Button -->
        <input 
            type="submit" 
            class="btn btn-primary" 
            value="Transfer Booking" 
            <?php echo !$agents_available ? 'disabled' : ''; ?>
        >
    </div>
</form>

<script>
    // JavaScript to toggle address field visibility
    function toggleAddressField() {
        const collectionType = document.getElementById('collection_type').value;
        const addressField = document.getElementById('address-field');
        if (collectionType === 'HomePickup') {
            addressField.style.display = 'block';
            document.getElementById('address').setAttribute('required', 'required');
        } else {
            addressField.style.display = 'none';
            document.getElementById('address').removeAttribute('required');
        }
    }
</script>

                                                            
                         <script type="text/javascript">
        $(window).on('beforeunload', function () {
            $("input[type=submit], input[type=button]").prop("disabled", "disabled");
        });
    </script>
      <script type="text/javascript">

			
					var password = new LiveValidation('password', { validMessage: 'validated', wait: 100});
		            	password.add(Validate.Presence, {failureMessage: "Password  can not be Blank!"});
		            	password.add( Validate.Length, { minimum: 6 } );
		            	password.add( Validate.Length, { maximum: 20} );
					//	password.add(Validate.Format, {pattern: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/});
					    password.add(Validate.Format, {pattern: /^(?=.*\d).{6,20}$/});
					
			
					var cnf_password = new LiveValidation('cnf_password', { validMessage: 'validated', wait: 100});
		            	cnf_password.add(Validate.Presence, {failureMessage: "Confirm Password  can not be Blank!"});
		                cnf_password.add( Validate.Length, { minimum: 6 } );
		            	cnf_password.add( Validate.Length, { maximum: 20} );
					//	cnf_password.add(Validate.Format, {pattern: /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/});
					    cnf_password.add(Validate.Format, {pattern: /^(?=.*\d).{6,20}$/});
						cnf_password.add( Validate.Confirmation, { match: 'password' } );
						
			
						
					var qname = new LiveValidation('name', { validMessage: 'validated', wait: 100});
		            	qname.add(Validate.Presence, {failureMessage: "Name can not be Blank!"});
		            	qname.add( Validate.Length, { minimum: 3 } );
		              	qname.add( Validate.Length, { maximum: 40} );
						qname.add(Validate.Format, {pattern: /^[a-z ,.'-]+$/i});
						
					var phone = new LiveValidation('phone', { validMessage: 'validated', wait: 100});
		            	phone.add(Validate.Presence, {failureMessage: "Phone Number can not be Blank!"});
		            	phone.add( Validate.Length, { minimum: 10 } );
		            	phone.add( Validate.Length, { maximum: 10} );
						phone.add(Validate.Format, {pattern: /^[0-9]{6,16}$/i});
						
				
		            var email = new LiveValidation('email', { validMessage: 'validated', wait: 100});
		            	email.add(Validate.Presence, {failureMessage: "Email can not be Blank!"});
		            	email.add( Validate.Length, { minimum: 6 } );
		            	email.add( Validate.Length, { maximum: 50} );
						email.add(Validate.Format, {pattern: /^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$/});
				
            </script>
                                </div>    
                                </div>
                            </div>
                        </div>

            
                </div>
            </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->




        <?php

include('footer.php');


?>


    </div>
    <!--**********************************
        Main wrapper end
    ******-->
	
<?php

include('footerjs.php');


?>

</body>

</html>
    
<?php
}
   
else
{
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
     
?>
