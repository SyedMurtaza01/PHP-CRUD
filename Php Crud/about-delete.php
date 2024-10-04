<?php 

include("config.php");

if(isset($_GET["ab-id"])){
 $about_id = $_GET["ab-id"];
}

$delete = "DELETE from `about` where `ab_id` = '$about_id'";
$query = mysqli_query ($connection , $delete) ;

if($query){
    session_start();
    $_SESSION['delete'] = "✅ Success! The about data has been successfully deleted. You can now manage your about.";
    header('Location: admin-about.php');
    exit();
}
?>