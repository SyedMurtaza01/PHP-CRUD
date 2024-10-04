<?php 

$connection = mysqli_connect("localhost", "root", "", "portfolio");
if(!$connection){
    die(mysqli_connect_error());
}

?>