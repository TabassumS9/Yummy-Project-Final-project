<?php
session_start();
include "../database/env.php";

$chefs_name = $_REQUEST['chefs_name'];
$titel = $_REQUEST['titel'];
$heading = $_REQUEST['heading'];
$detail = $_REQUEST['detail'];
$twitter_link = $_REQUEST['twitter_link'];
$facebook_link = $_REQUEST['facebook_link'];
$instragram_link = $_REQUEST['instragram_link'];
$linkedin_link = $_REQUEST['linkedin_link'];
$chefs_img = $_FILES['chefs_img'];

$errors =[];





// unique name
// About Image Validation
$extension = pathinfo($chefs_img['name']) ['extension'];
$accepted_types = ['jpg','png',];
if($chefs_img['size'] == 0) {
    $errors['banner_img_error'] = "Please Select Your Image";
}
else if (!in_array($extension,$accepted_types)){
    $errors['banner_img_error'] = "Supported types are jpg,png";
}
else if($chefs_img['size'] > 600000){
    $errors['banner_img_error'] = "Total size is 500KB";
}


if(count($errors) > 0){
    $_SESSION['banner_errors'] = $errors;
    header("Location: ../Backend_file/addchefs.php");
}
///
$fileName = "Chefs-" . uniqid() .".$extension";

//file make
$path = "../uploads/chefs";
if(!is_dir($path)){
    mkdir($path);
}
$uploaded_file = move_uploaded_file($chefs_img['tmp_name'],"../uploads/chefs/$fileName");


if($uploaded_file){


    $query = "INSERT INTO chefs(chefs_name, titel, heading, detail, twitter_link, facebook_link, instragram_link, linkedin_link, chefs_img) VALUES ('$chefs_name','$titel','$heading','$detail','$twitter_link','$facebook_link','$instragram_link','$linkedin_link','$fileName')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
}
header("Location: ../Backend_file/allChefs.php");