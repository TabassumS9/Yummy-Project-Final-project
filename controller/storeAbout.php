<?php
session_start();
include "../database/env.php";

$heading = $_REQUEST['heading'];
$titel = $_REQUEST['titel'];
$detail = $_REQUEST['detail'];
$cta_video = $_REQUEST['cta_video'];
$img_book_sub_table = $_REQUEST['img_book_sub_table'];
$img_book_table = $_REQUEST['img_book_table'];
$about_img = $_FILES['about_img'];
$about_img_sub = $_FILES['about_img_sub'];
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
if(empty($cta_video)){
    $errors['cta_link_error'] = "Enter your cta_link";
}
if(empty($img_book_table)){
    $errors['video_link_error'] = "Enter your video_link";
}
if(empty($img_book_sub_table)){
    $errors['video_link_error'] = "Enter your video_link";
}





// unique name
// About Image Validation
$extension = pathinfo($about_img['name']) ['extension'];
$accepted_types = ['jpg','png',];
if($about_img['size'] == 0) {
    $errors['banner_img_error'] = "Please Select Your Image";
}
else if (!in_array($extension,$accepted_types)){
    $errors['banner_img_error'] = "Supported types are jpg,png";
}
else if($about_img['size'] > 600000){
    $errors['banner_img_error'] = "Total size is 500KB";
}
// About Image Sub Validation
$extension = pathinfo($about_img_sub['name']) ['extension'];
$accepted_types = ['jpg','png',];
if($about_img_sub['size'] == 0) {
    $errors['banner_img_error'] = "Please Select Your Image";
}
else if (!in_array($extension,$accepted_types)){
    $errors['banner_img_error'] = "Supported types are jpg,png";
}
else if($about_img_sub['size'] > 600000){
    $errors['banner_img_error'] = "Total size is 500KB";
}

if(count($errors) > 0){
    $_SESSION['banner_errors'] = $errors;
    header("Location: ../Backend_file/aboutaddBanner.php");
}
///
$fileName = "About-" . uniqid() .".$extension";
$fileName2 = "About-Sub-image" . uniqid() .".$extension";
//file make
$path = "../uploads/abouts";
if(!is_dir($path)){
    mkdir($path);
}
$uploaded_file = move_uploaded_file($about_img['tmp_name'],"../uploads/abouts/$fileName");
$uploaded_file = move_uploaded_file($about_img_sub['tmp_name'],"../uploads/abouts/$fileName2");

if($uploaded_file){

    $query = "INSERT INTO abouts(heading, titel, detail, cta_video, img_book_table,img_book_sub_table, about_img, about_img_sub) VALUES ('$heading','$titel','$detail','$cta_video','$img_book_table','$img_book_sub_table','$fileName','$fileName2')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
}
header("Location: ../Backend_file/aboutallBanners.php");