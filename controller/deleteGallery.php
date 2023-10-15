<?php

include "../database/env.php";

$id = $_REQUEST['id'];
$query = "SELECT gallery_img FROM gallery_img WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$deletegallery = mysqli_fetch_assoc($res);



$path = "../uploads/gallery/" . $deletegallery['gallery_img'];


if(file_exists($path)){
    unlink($path);
}

$query = "DELETE FROM gallery_img WHERE id = '$id'";
$res = mysqli_query($conn,$query);
var_dump($res);
header("Location: ../Backend_file/allGallery.php");