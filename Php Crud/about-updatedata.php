<?php 
include("config.php");

if(isset($_POST["aboutupdate"])){
    $about_id = $_POST["about-id"];
    $about_name = $_POST["about-name"];
    $about_email = $_POST["about-email"];
    $about_phone = $_POST["about-phone"];
    $about_dob = $_POST["about-dob"];
    $about_address = $_POST["about-address"];
    $about_zipcode = $_POST["about-zipcode"];
    $about_img = $_FILES['about-img']['name'];
    $about_tmp_img = $_FILES['about-img']['tmp_name'];
    $about_cv = $_FILES['about-cv']['name'];
    $about_tmp_cv = $_FILES['about-cv']['tmp_name'];
    $about_desc = $_POST["about-desc"];
}
$update_about = "UPDATE `about` SET `ab_name`='$about_name',`ab_email`='$about_email',
`ab_phone`='$about_phone',`ab_dob`='$about_dob', `ab_address`='$about_address', `ab_zipcode`='$about_zipcode', `ab_img`='$about_img', `ab_cv`='$about_cv', `ab_desc`='$about_desc' WHERE `ab_id`='$about_id'";
$update_result = mysqli_query($connection, $update_about);

move_uploaded_file($about_tmp_img, '../Adm-Portfolio/images/Portfolio/about-images/' . $about_img);
move_uploaded_file($about_tmp_cv, '../Adm-Portfolio/images/Portfolio/about-images/' . $about_cv);

if($update_result){
    session_start();
    $_SESSION['success'] = "Your about has been successfully updated! 🎉 Keep up the great work.";
    header('Location: admin-about.php');
    exit();
}
?>