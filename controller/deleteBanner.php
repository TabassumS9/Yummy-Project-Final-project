<?php

include "../database/env.php";

$id = $_REQUEST['id'];
$query = "SELECT banner_img FROM banners WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$deleteBanner = mysqli_fetch_assoc($res);



$path = "../uploads/banners/" . $deleteBanner['banner_img'];


if(file_exists($path)){
    unlink($path);
}

$query = "DELETE FROM banners WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allBanners.php");