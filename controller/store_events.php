<?php
session_start();
include "../database/env.php";

$titel = $_REQUEST['titel'];
$price = $_REQUEST['price'];
$detail = $_REQUEST['detail'];
$event_img = $_FILES['event_img'];

$errors =[];





// unique name
// About Image Validation
$extension = pathinfo($event_img['name']) ['extension'];
$accepted_types = ['jpg','png',];
if($event_img['size'] == 0) {
    $errors['banner_img_error'] = "Please Select Your Image";
}
else if (!in_array($extension,$accepted_types)){
    $errors['banner_img_error'] = "Supported types are jpg,png";
}
else if($event_img['size'] > 600000){
    $errors['banner_img_error'] = "Total size is 500KB";
}


if(count($errors) > 0){
    $_SESSION['banner_errors'] = $errors;
    header("Location: ../Backend_file/addTestimonial.php");
}
///
$fileName = "Events-" . uniqid() .".$extension";

//file make
$path = "../uploads/events";
if(!is_dir($path)){
    mkdir($path);
}
$uploaded_file = move_uploaded_file($event_img['tmp_name'],"../uploads/events/$fileName");


if($uploaded_file){


    $query = "INSERT INTO events(titel, price, detail, event_img) VALUES ('$titel','$price','$detail','$fileName')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
}
header("Location: ../Backend_file/allEvents.php");