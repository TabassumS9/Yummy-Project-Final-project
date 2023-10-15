<?php
session_start();
include "../database/env.php";

$gallery_img = $_FILES['gallery_img'];

$extension = pathinfo($gallery_img['name']) ['extension'];
$fileName = "Gallery-" . uniqid() .".$extension";

//file make
$path = "../uploads/gallery";
if(!is_dir($path)){
    mkdir($path);
}
$uploaded_file = move_uploaded_file($gallery_img['tmp_name'],"../uploads/gallery/$fileName");


if($uploaded_file){


    $query = "INSERT INTO gallery_img(gallery_img) VALUES ('$fileName')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
}
header("Location: ../Backend_file/allGallery.php");