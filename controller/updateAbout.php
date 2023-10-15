<?php
include "../database/env.php";
session_start();
$id = $_REQUEST['id'];
$heading = $_REQUEST['heading'];
$titel = $_REQUEST['titel'];
$detail = $_REQUEST['detail'];
$cta_video = $_REQUEST['cta_video'];
$img_book_sub_table = $_REQUEST['img_book_sub_table'];
$img_book_table = $_REQUEST['img_book_table'];
$about_img = $_FILES['about_img'];
$about_img_sub = $_FILES['about_img_sub'];



if($about_img['size']>0){
    $extension = pathinfo($about_img['name'])['extension'];
    $extension2 = pathinfo($about_img_sub['name'])['extension'];
    $fileName = "About-" . uniqid() . ".$extension";
    $fileName2 = "About Sub -" . uniqid() . ".$extension2";
    $path = "../uploads/abouts";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads =  move_uploaded_file($about_img['tmp_name'],"../uploads/abouts/". $fileName);
    $uploads2 =  move_uploaded_file($about_img_sub['tmp_name'],"../uploads/abouts/". $fileName2);
    if($uploads){
        $query = "SELECT about_img FROM abouts WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        $previousAbout = mysqli_fetch_assoc($res);
        $path = "../uploads/abouts/" . $previousAbout['about_img'];


        if(file_exists($path)){
            unlink($path);
        }

        $query = "UPDATE abouts SET heading='$heading',titel='$titel',detail='$detail',cta_video='$cta_video',img_book_table='$img_book_table',img_book_sub_table='$img_book_sub_table',about_img='$fileName',about_img_sub='$fileName2' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/aboutallBanners.php");

    }
    
    else{
        $query = "UPDATE abouts SET heading='$heading',titel='$titel',detail='$detail',cta_video='$cta_video',img_book_table='$img_book_table',img_book_sub_table='$img_book_sub_table',about_img='$fileName',about_img_sub='$fileName2', WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/aboutallBanners.php");
        $_SESSION['msg'] = "Successfully Updated";
    
    }
}
header("Location: ../Backend_file/aboutallBanners.php");

