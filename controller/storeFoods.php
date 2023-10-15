<?php
session_start();
include "../database/env.php";

$titel = $_REQUEST['titel'];
$detail = $_REQUEST['detail'];
$price = $_REQUEST['price'];
$category = $_REQUEST['category'];
$food_img = $_FILES['food_img'];
$errors = [];



// unique name
$extension = pathinfo($food_img['name']) ['extension'];
$accepted_types = ['jpg','png',];
if($food_img['size'] == 0) {
    $errors['banner_img_error'] = "Please Select Your Image";
}
else if (!in_array($extension,$accepted_types)){
    $errors['banner_img_error'] = "Supported types are jpg,png";
}
else if($food_img['size'] > 600000){
    $errors['banner_img_error'] = "Total size is 500KB";
}

if(count($errors) > 0){
    $_SESSION['banner_errors'] = $errors;
    // header("Location: ../Backend_file/addBanner.php");
}


///
$fileName = "Food-" . uniqid() .".$extension";
// //file make
$path = "../uploads/foods";
if(!is_dir($path)){
    mkdir($path);
}
$uploaded_file = move_uploaded_file($food_img['tmp_name'],"../uploads/foods/$fileName");


if($uploaded_file){
    $query = "INSERT INTO menufoods(category_id, titel, detail, price, food_image) VALUES ('$category','$titel','$detail','$price','$fileName')";
    $res = mysqli_query($conn,$query);
    if($res){
        header("Location: ../Backend_file/addFoods.php");
    }
}