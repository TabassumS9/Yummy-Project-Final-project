<?php
session_start();
include "../database/env.php";

$heading = $_REQUEST['heading'];
$titel = $_REQUEST['titel'];
$detail = $_REQUEST['detail'];
$client_name = $_REQUEST['client_name'];
$client_position = $_REQUEST['client_position'];
$testimonial_img = $_FILES['testimonial_img'];


$errors = [];



if(empty($heading)){
    $errors['titel_error'] = "Enter your Titel";
}
if(empty($titel)){
    $errors['detail_error'] = "Enter your Detail";
}
if(empty($detail)){
    $errors['cta_titel_error'] = "Enter your cta_titel";
}
if(empty($client_name)){
    $errors['cta_link_error'] = "Enter your client_name";
}
if(empty($client_position)){
    $errors['video_link_error'] = "Enter your client_position";
}





// unique name
// About Image Validation
$extension = pathinfo($testimonial_img['name']) ['extension'];
$accepted_types = ['jpg','png',];
if($testimonial_img['size'] == 0) {
    $errors['banner_img_error'] = "Please Select Your Image";
}
else if (!in_array($extension,$accepted_types)){
    $errors['banner_img_error'] = "Supported types are jpg,png";
}
else if($testimonial_img['size'] > 600000){
    $errors['banner_img_error'] = "Total size is 500KB";
}


if(count($errors) > 0){
    $_SESSION['banner_errors'] = $errors;
    header("Location: ../Backend_file/addTestimonial.php");
}
///
$fileName = "Testimonial-" . uniqid() .".$extension";

//file make
$path = "../uploads/testimonials";
if(!is_dir($path)){
    mkdir($path);
}
$uploaded_file = move_uploaded_file($testimonial_img['tmp_name'],"../uploads/testimonials/$fileName");


if($uploaded_file){


    $query = "INSERT INTO testimonials(heading, titel, detail, client_name, client_position, testimonial_img) VALUES ('$heading','$titel','$detail','$client_name','$client_position','$fileName')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
}
header("Location: ../Backend_file/alltestimonial.php");