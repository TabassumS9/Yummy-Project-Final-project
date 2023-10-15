<?php

include "../database/env.php";

$id = $_REQUEST['id'];
$query = "SELECT about_img FROM abouts WHERE id = '$id'";
$query2 = "SELECT about_img_sub FROM abouts WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$res2 = mysqli_query($conn,$query2);
$deleteBanner = mysqli_fetch_assoc($res);
$deleteBanner2 = mysqli_fetch_assoc($res2);



$path = "../uploads/abouts/" . $deleteBanner['about_img'];
$path2 = "../uploads/abouts/" . $deleteBanner2['about_img_sub'];


if(file_exists($path)){
    unlink($path);
}
if(file_exists($path2)){
    unlink($path2);
}
$query = "DELETE FROM abouts WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/aboutallBanners.php");