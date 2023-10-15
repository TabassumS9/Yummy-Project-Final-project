<?php
session_start();
include "../database/env.php";

// Counter 1

$number_1 = $_REQUEST['number_1'];
$titel_1 = $_REQUEST['titel_1'];
$errors= [];

// Slider 1 validation
if(empty($titel_1)){
    $errors['titel_error'] = "Enter your titel_1";
}
if(empty($number_1)){
    $errors['detail_error'] = "Enter your number_1";
}


// unique name


if(count($errors) == 0){
    $_SESSION['banner_errors'] = $errors;
    header("Location: ../Backend_file/counterall.php");
}
else{
    
}

$query = "INSERT INTO counters(number_1, titel_1) VALUES ('$number_1','$titel_1')";    
$res = mysqli_query($conn,$query);
var_dump($res);


header("Location: ../Backend_file/counterAll.php");