<?php
session_start();
include "../database/env.php";

$titel = $_REQUEST['titel'];
$detail = $_REQUEST['detail'];
$cta_titel = $_REQUEST['cta_titel'];
$cta_link = $_REQUEST['cta_link'];
$video_link = $_REQUEST['video_link'];
$banner_img = $_FILES['banner_img'];
$errors = [];



if(empty($titel)){
    $errors['titel_error'] = "Enter your Titel";
}
if(empty($detail)){
    $errors['detail_error'] = "Enter your Detail";
}
if(empty($cta_titel)){
    $errors['cta_titel_error'] = "Enter your cta_titel";
}
if(empty($cta_link)){
    $errors['cta_link_error'] = "Enter your cta_link";
}
if(empty($video_link)){
    $errors['video_link_error'] = "Enter your video_link";
}





// unique name
$extension = pathinfo($banner_img['name']) ['extension'];
$accepted_types = ['jpg','png',];
if($banner_img['size'] == 0) {
    $errors['banner_img_error'] = "Please Select Your Image";
}
else if (!in_array($extension,$accepted_types)){
    $errors['banner_img_error'] = "Supported types are jpg,png";
}
else if($banner_img['size'] > 600000){
    $errors['banner_img_error'] = "Total size is 500KB";
}

if(count($errors) > 0){
    $_SESSION['banner_errors'] = $errors;
    header("Location: ../Backend_file/addBanner.php");
}
///
$fileName = "Banner-" . uniqid() .".$extension";
//file make
$path = "../uploads/banners";
if(!is_dir($path)){
    mkdir($path);
}
$uploaded_file = move_uploaded_file($banner_img['tmp_name'],"../uploads/banners/$fileName");

if($uploaded_file){
    $query = "INSERT INTO banners(titel, detail, cta_titel, cta_link, video_link, banner_img) VALUES ('$titel', '$detail', '$cta_titel', '$cta_link', '$video_link', '$fileName')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
}
header("Location: ../Backend_file/allBanners.php");