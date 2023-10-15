<?php
include "../database/env.php";
session_start();
$id = $_REQUEST['id'];
$titel = $_REQUEST['titel'];
$detail = $_REQUEST['detail'];
$cta_titel = $_REQUEST['cta_titel'];
$cta_link = $_REQUEST['cta_link'];
$video_link = $_REQUEST['video_link'];
$banner_img = $_FILES['banner_img'];



if($banner_img['size']>0){
    $extension = pathinfo($banner_img['name'])['extension'];
    $fileName = "Banner-" . uniqid() . ".$extension";
    $path = "../uploads/banners";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads =  move_uploaded_file($banner_img['tmp_name'],"../uploads/banners/". $fileName);
    if($uploads){
        $query = "SELECT banner_img FROM banners WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        $previousBanner = mysqli_fetch_assoc($res);
        $path = "../uploads/banners/" . $previousBanner['banner_img'];


        if(file_exists($path)){
            unlink($path);
        }
        $query = "UPDATE banners SET titel='$titel',detail='$detail',cta_titel='$cta_titel',cta_link='$cta_link',video_link='$video_link',banner_img='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        header("Location: ../Backend_file/allBanners.php");

    }
}
else{
    $query = "UPDATE banners SET titel='$titel',detail='$detail',cta_titel='$cta_titel',cta_link='$cta_link',video_link='$video_link' WHERE id = '$id'";
    $res = mysqli_query($conn,$query);
    header("Location: ../Backend_file/allBanners.php");
    $_SESSION['msg'] = "Successfully Updated";

}
