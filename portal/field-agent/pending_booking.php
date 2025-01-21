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
                $branch=$row6['branch'];
                        $branchn = $row6['branch_name'];


    }


    include('doctype.php');
?>



<head>


<title><?php echo $type; ?> </title>


<style>
.table{
    text-align:center;
    
}

</style>
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
                        <h4 class="card-title">Manage Patients</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="patients_data" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>S.No</strong></th>
                                        <th><strong>Patient ID</strong></th>
                                         <th><strong>TRF</strong></th>
                                      
                                        <th><strong>Collected Items</strong></th>
                                        <th><strong>Collection Type</strong></th>
                                        <th><strong>Address</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                 
                                    
                                    $patient_fetch = "SELECT * FROM patients WHERE branch='$branch' AND updated_by='$access_id' AND act='2' AND prog='' ORDER BY id DESC";
                                    $fetch_query = mysqli_query($conn, $patient_fetch);  
                                    
                                    $sno = 1;
                                    while ($row = mysqli_fetch_array($fetch_query)) {    
                                         $patient_id = $row['patient_id'];
                                       $trf=$row['trf_form'];
                                        $collected_items = $row['collected_items'];
                                        $collection_type = $row['collection_type'];
                                        $address=$row['address'];
                                        echo "<tr>
                                            <td><strong>$sno</strong></td>
                                            <td>$patient_id</td>
                                            <td><img src=\"$trf\" width=\"50%\"></td>
                                           
                                            <td>$collected_items</td>
                                            <td>$collection_type</td>
                                             <td>$address</td>
                                          
                                        </tr>";
                                        $sno++;   
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <script>  
                                $(document).ready(function(){  
                                    $('#patients_data').DataTable();  
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

