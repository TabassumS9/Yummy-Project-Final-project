<?php

include "../database/env.php";

$id = $_REQUEST['id'];
$query1 = "SELECT icon_2 FROM sliders WHERE id = '$id'";
$res2 = mysqli_query($conn,$query1);
$deleteBanner = mysqli_fetch_assoc($res2);

$path1 = "../uploads/sliders/" . $deleteBanner['icon_2'];

if(file_exists($path1)){
    unlink($path);
}


$query = "DELETE FROM sliders WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/SliderAll.php");