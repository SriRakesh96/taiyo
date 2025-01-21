 <?php

include('offline.php');


include('doctype.php');


?>

<head>


 <title>Taiyo Labs || Message</title>


<?php

include('head.php');


?>


</head>


<body class="vh-100">
    
   <?php

$ms_id = $_GET['ms_id'];

$fetch_msg = "SELECT * FROM taiyo_message WHERE msg_id='$ms_id'";

$fetch_msg_query = mysqli_query($conn, $fetch_msg);

while ($row = mysqli_fetch_assoc($fetch_msg_query))
{

    $mess = $row["msg_text"];

    $redirect_link = $row["redirect_link"];

    $button_text = $row["msg_btn_text"];


}

?>


     <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-8">
                    <div class="form-input-content text-center error-page">
                        <img src="../assets/img/invalid.png" alt="invalid" class="error-text font-weight-bold">
                       
						   <p style="margin-top:10px"><i class="fa fa-exclamation-triangle text-warning"></i><?php echo $mess; ?></p>
						   
						   <div>
                            <a class="btn btn-primary" href="<?php echo $redirect_link; ?>"><?php echo $button_text; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
<?php

include('footerjs.php');

?>

</body>

</html>