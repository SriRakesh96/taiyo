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
    <title>Manage Inventory</title>
    <?php include('head.php'); ?>
</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <?php include('header.php'); ?>
        <?php include('home_sidebar.php'); ?>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Manage Inventory</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="inventory_data" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width:80px;"><strong>S.No</strong></th>
                                         
                                                <th><strong>News ID</strong></th>
                                            <th><strong>Branch Name</strong></th>
                                                <th><strong>News</strong></th>
                                             
                                               
                                                <th><strong>Action</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                             $fetch_news="SELECT * FROM taiyo_news WHERE act='1'";
                      
                      $fetchnq=mysqli_query($conn, $fetch_news);
                      
                       $sno = 1;
                      if(mysqli_num_rows($fetchnq) > 0){
                          
                          while($row4 =mysqli_fetch_assoc($fetchnq)){
                              
                              $news=$row4['news'];
                              
                              $news_id=$row4['news_id'];
                              
                              $branch=$row4['branch_name'];
                              
                          }

                                                echo "<tr>
                                                    <td><strong>$sno</strong></td>
                                                  
                                                    <td>$news_id</td>
                                                    
                                                    <td>$branch</td>
                                                    <td>$news</td>
                                                    <td>
    <div class=\"dropdown\">
        <button type=\"button\" class=\"btn btn-success light sharp\" data-toggle=\"dropdown\">
            <svg width=\"20px\" height=\"20px\" viewBox=\"0 0 24 24\" version=\"1.1\">
                <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <rect x=\"0\" y=\"0\" width=\"24\" height=\"24\"></rect>
                    <circle fill=\"#000000\" cx=\"5\" cy=\"12\" r=\"2\"></circle>
                    <circle fill=\"#000000\" cx=\"12\" cy=\"12\" r=\"2\"></circle>
                    <circle fill=\"#000000\" cx=\"19\" cy=\"12\" r=\"2\"></circle>
                </g>
            </svg>
        </button>
        <div class=\"dropdown-menu\">
            <a class=\"dropdown-item\" href=\"delete_news?news_id=$news_id\">Delete</a>
        </div>
    </div>
</td>
                                                </tr>";
                                                $sno++;   
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <script>  
                                        $(document).ready(function(){  
                                            $('#inventory_data').DataTable();  
                                        });  
                                    </script> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php'); ?>
    </div>

    <?php include('footerjs.php'); ?>
</body>
</html>

<?php
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=invalid.php?ms_id=jn63eJ\" />";
}
?>
