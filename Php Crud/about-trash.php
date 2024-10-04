<?php 

include("config.php");

if(isset($_GET["ab-id"])){
    $about_id = $_GET['ab-id'];
}

$trash = "UPDATE `about` set status='0' where `ab_id` = '$about_id'";

$result = mysqli_query($connection, $trash);
if (!$trash) {
    die("Query Failed");
}
header('location:about-trashdata.php');
?>