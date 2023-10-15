<?php
session_start();
include "../database/env.php";

// slider 1

$titel_1 = $_REQUEST['titel_1'];
$sliderBtn = $_REQUEST['sliderBtn'];
$detail_1 = $_REQUEST['detail_1'];
$icon_2 = $_FILES['icon_2'];
$titel_2 = $_REQUEST['titel_2'];
$detail_2 = $_REQUEST['detail_2'];



///
$extension = pathinfo($icon_2['name']) ['extension'];
$fileName1 = "Slider-" . uniqid() .".$extension";

//file make
$path = "../uploads/sliders";
if(!is_dir($path)){
    mkdir($path);
}
$uploaded_file = move_uploaded_file($icon_2['tmp_name'],"../uploads/sliders/$fileName1");


if($uploaded_file){

    
    $query = "INSERT INTO sliders(titel_1, sliderBtn, detail_1, icon_2, titel_2, detail_2) VALUES ('$titel_1','$sliderBtn','$detail_1','$fileName1','$titel_2','$detail_2')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
    header("Location: ../Backend_file/SliderAll.php");
}

