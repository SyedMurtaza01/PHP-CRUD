<?php 

include("config.php");

if(isset ($_GET["ab-id"])){
    $restore_id = $_GET ['ab-id'];
}

$update = "UPDATE `about` set status = '1' where ab_id ='$restore_id'";

$result = mysqli_query ($connection , $update);
if($result){
    header('location:about-trashdata.php');
}
?>