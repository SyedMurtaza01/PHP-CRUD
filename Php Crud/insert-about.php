<?php 
include("config.php");

if(isset($_POST['addabout'])){
    $about_name = $_POST['about-name'];
    $about_email = $_POST['about-email'];
    $about_phone = $_POST['about-phone'];
    $about_dob = $_POST['about-dob'];
    $about_address = $_POST['about-address'];
    $about_zipcode = $_POST['about-zipcode'];
    $about_img = $_FILES['about-img']['name'];
    $about_tmp_img = $_FILES['about-img']['tmp_name'];
    $about_cv = $_FILES['about-cv']['name'];
    $about_tmp_cv = $_FILES['about-cv']['tmp_name'];
    $about_desc = $_POST['about-desc'];

    if(!empty($about_name)AND !empty($about_email) 
    AND !empty($about_phone) AND !empty($about_dob) 
    AND !empty($about_address) AND !empty($about_zipcode) 
    AND !empty($about_img)AND !empty($about_cv) AND !empty($about_desc)){

        $insert_about = "INSERT INTO `about` 
        (`ab_id`, `ab_name`, `ab_email`, `ab_phone`,`ab_dob`, `ab_address`, `ab_zipcode`, `ab_img`, `ab_cv`, `ab_desc`, `status`)
         VALUES (NULL, '$about_name', '$about_email', '$about_phone','$about_dob', '$about_address', '$about_zipcode', '$about_img', '$about_cv','$about_desc', '1')";

        $about_result = mysqli_query($connection, $insert_about);
        move_uploaded_file($about_tmp_img, '../Adm-Portfolio/images/Portfolio/about-images/' . $about_img);
        move_uploaded_file($about_tmp_cv, '../Adm-Portfolio/images/Portfolio/about-images/' . $about_cv);

        if($about_result){
            session_start();
            $_SESSION['success'] = "🎉 Great job! Your about has been successfully added. Check it out in the about list.";
            header('Location: about.php');
            exit();
        }
    }
}
?>