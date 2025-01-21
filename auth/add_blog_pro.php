<?php

include ("offline.php");


$letters = "ABCDGHJKMNOPQRSTUVWXYZ";
$numbers = rand(100, 999);
$prefix = "BLOG";
$sufix = $letters[rand(0, 21) ];

$blog_id = $prefix . $numbers . $sufix;


$adm_id = $_POST['adm_id'];


$prop_name= $_POST['prop_name'];

   
$title = $_POST['title'];

$desc = $_POST['description'];


$ip = $_SERVER['REMOTE_ADDR'];

//image upload outdoor


$maxDim = 1080;



$file_name = $_FILES['blog_img']['name'];
$file_tmp_name = $_FILES['blog_img']['tmp_name'];
$file_target = '../images/blog/';
$file_size = $_FILES['blog_img']['size'];

//image size info

$fileinfo = @getimagesize($_FILES["blog_img"]["tmp_name"]);

$width = $fileinfo[0];
$height = $fileinfo[1];

//echo "$height::$width<br>";
// Resize

$ratio = $width / $height;
if ($ratio > 1)
{
    $new_width = $maxDim; 
    $new_height = $maxDim/$ratio;
}
else
{
    $new_height =  $maxDim; 
    $new_width = $maxDim*$ratio;;

}

//echo "$new_width ::$new_width<br>";
// Rename file
$temp = explode('.', $file_name);
$newfilename = "$blog_id." . end($temp);

// Upload image
if (move_uploaded_file($file_tmp_name, $file_target . $newfilename))
{
    $src = imagecreatefromstring(file_get_contents($file_target . $newfilename));
    $dst = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    imagedestroy($src);
    imagepng($dst, $file_target . $newfilename);
    imagedestroy($dst);

}

// image upload Ends

$blog_add="INSERT INTO `blog` (`id`, `adm_id`, `blog_id`, `blog_img`, `blog_title`, `blog_desc`, `blog_add_date`, `ip`, `act`) 
VALUES (NULL, '$adm_id', '$blog_id', '$newfilename', '$title', '$desc', '$ltz', '$ip', '1')";

if (mysqli_query($conn, $blog_add))
    {
        
       

        echo "<meta http-equiv=\"refresh\" content=\"1;url=log_mess.php?msg_id=QLxcfH\" />";

    }
    else
    {
        echo "Error: "  . "<br>" . mysqli_error($conn);
    }





mysqli_close($conn);

?>
