<?php
include "../database/env.php";
session_start();

$id = $_REQUEST['id'];

$titel_1 = $_REQUEST['titel_1'];
$sliderBtn = $_REQUEST['sliderBtn'];
$detail_1 = $_REQUEST['detail_1'];
$icon_2 = $_FILES['icon_2'];
$titel_2 = $_REQUEST['titel_2'];
$detail_2 = $_REQUEST['detail_2'];


if($icon_2['size']>0){
    $extension = pathinfo($icon_2['name'])['extension'];
    $fileName = "sliders-" . uniqid() .".$extension";
    $path = "../uploads/sliders";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads =  move_uploaded_file($icon_2['tmp_name'],"../uploads/sliders/". $fileName);
        $query = "SELECT icon_2 FROM sliders WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        $previousAbout = mysqli_fetch_assoc($res);
        $path = "../uploads/sliders/" . $previousAbout['icon_2'];


        if(file_exists($path)){
            unlink($path);
        }

        $query = "UPDATE sliders SET icon_2='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/SliderAll.php");

    }
    
    else{
        $query = "UPDATE sliders SET icon_2='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/SliderAll.php");

    
    }
header("Location: ../Backend_file/SliderAll.php");