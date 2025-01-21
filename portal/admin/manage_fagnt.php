<?php

include('offline.php');


if (!empty($_COOKIE['adm_email']) && !empty($_COOKIE['adm_password'])) {
    $cookie_email = $_COOKIE['adm_email'];
    $cookie_password = $_COOKIE['adm_password'];
    

    $user_data = "SELECT * FROM taiyo_admin WHERE email='$cookie_email'";
    $user_conn = mysqli_query($conn, $user_data);

    while ($row6 = mysqli_fetch_assoc($user_conn)) {
        $type = $row6['access_type'];
        $access_id = $row6['access_id'];
        $name = $row6['name'];
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
				
            <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Field Agents</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                  
                                       <table id="emp_data" class="table table-striped table-bordered">
                              <thead>
                                 <tr>
                                     <tr>
                                                <th style="width:80px;"><strong>S.No</strong></th>
                                               
                                                <th><strong>Branch</strong></th>
                                                
                                                <th><strong>Name</strong></th>
                                                
                                                <th><strong>Phone</strong></th>
                                                
                                              
                                                <th><strong>Action</strong></th>
                                 </tr>
                              </thead>
                              
                              
                            
                                         <?php 

                                    

                                $emp_fetch ="SELECT * FROM taiyo_fagent WHERE act='1' ORDER BY id DESC"; 
                                 $fetch_equery = mysqli_query($conn, $emp_fetch);  
                                 $row1= 0;
                                 
                                                  $sno = $row1 + 1;
                                                  while($row2 = mysqli_fetch_array($fetch_equery))  
                                 {    

                                                $fagnt_id=$row2['access_id'];
                                                
                                                 $branch=$row2['branch_name'];
                                                
                                                $fagnt_name=$row2['name'];

                                                $fagnt_email=$row2['email'];

                                                 $fagnt_phone=$row2['phone'];
                                                
                                                
                                              
                                              echo  "<tr>
                                               
                                              <td><strong>$sno</strong></td>
                                                <td>$branch</td>
                                                
                                           
                                                  <td>$fagnt_name</td>
                                                  
                                                  <td>$fagnt_phone</td>
                                              

                                                  
                                                  <td>
                                                      <div class=\"dropdown\">
                                                          <button type=\"button\" class=\"btn btn-success light sharp\" data-toggle=\"dropdown\">
                                                              <svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" version=\"1.1\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"></rect><circle fill=\"#000000\" cx=\"5\" cy=\"12\" r=\"2\"></circle><circle fill=\"#000000\" cx=\"12\" cy=\"12\" r=\"2\"></circle><circle fill=\"#000000\" cx=\"19\" cy=\"12\" r=\"2\"></circle></g></svg>
                                                          </button>
                                                          <div class=\"dropdown-menu\">
                                                          <a class=\"dropdown-item\" href=\"edit_fagent?adm_id=$fagnt_id\">Edit</a>
                                                                    <a class=\"dropdown-item\" href=\"edit_fagpass?adm_id=$fagnt_id\">Change Password</a>    
                                                              <a class=\"dropdown-item\" href=\"delete_fag?adm_id=$fagnt_id\" onclick=\"return confirm('Are you sure want to delete?');\">Delete</a>
                                                          </div>
                                                      </div>
                                                  </td>
  
  
  
                                              </tr>
                                      ";

                                     $sno++;   }
                                    
                                            ?>
                                    
                                    </table>
                                     <script>  
                              $(document).ready(function(){  
                                   $('#emp_data').DataTable();  
                              });  
                           </script> 
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                </div>

            </div>

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

