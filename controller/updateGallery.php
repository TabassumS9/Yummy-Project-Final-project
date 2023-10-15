<?php
include "../database/env.php";
session_start();

$id = $_REQUEST['id'];
$gallery_img = $_FILES['gallery_img'];


if($gallery_img['size']>0){
    $extension = pathinfo($gallery_img['name'])['extension'];
    $fileName = "Gallery-" . uniqid() .".$extension";
    $path = "../uploads/gallery";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads =  move_uploaded_file($gallery_img['tmp_name'],"../uploads/gallery/". $fileName);
        $query = "SELECT gallery_img FROM gallery_img WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        $previousAbout = mysqli_fetch_assoc($res);
        $path = "../uploads/gallery/" . $previousAbout['gallery_img'];


        if(file_exists($path)){
            unlink($path);
        }

        $query = "UPDATE gallery_img SET gallery_img='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/allGallery.php");

    }
    
    else{
        $query = "UPDATE gallery_img SET gallery_img='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/allGallery.php");
    
    }
header("Location: ../Backend_file/allGallery.php");
