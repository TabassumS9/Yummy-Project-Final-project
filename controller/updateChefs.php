<?php
include "../database/env.php";
session_start();

$id = $_REQUEST['id'];
$chefs_name = $_REQUEST['chefs_name'];
$titel = $_REQUEST['titel'];
$heading = $_REQUEST['heading'];
$detail = $_REQUEST['detail'];
$twitter_link = $_REQUEST['twitter_link'];
$facebook_link = $_REQUEST['facebook_link'];
$instragram_link = $_REQUEST['instragram_link'];
$linkedin_link = $_REQUEST['linkedin_link'];
$chefs_img = $_FILES['chefs_img'];



if($chefs_img['size']>0){
    $extension = pathinfo($chefs_img['name'])['extension'];
    $fileName = "Chefs-" . uniqid() .".$extension";
    $path = "../uploads/chefs";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads =  move_uploaded_file($chefs_img['tmp_name'],"../uploads/chefs/". $fileName);
        $query = "SELECT chefs_img FROM chefs WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        $previousAbout = mysqli_fetch_assoc($res);
        $path = "../uploads/chefs/" . $previousAbout['chefs_img'];


        if(file_exists($path)){
            unlink($path);
        }

        
        $query = "UPDATE chefs SET chefs_name='$chefs_name',titel='$titel',heading='$heading',detail='$detail',twitter_link='$twitter_link',facebook_link='$facebook_link',instragram_link='$instragram_link',linkedin_link='$linkedin_link',chefs_img='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/allChefs.php");

    }
    
    else{
        $query = "UPDATE chefs SET chefs_name='$chefs_name',titel='$titel',heading='$heading',detail='$detail',twitter_link='$twitter_link',facebook_link='$facebook_link',instragram_link='$instragram_link',linkedin_link='$linkedin_link',chefs_img='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/allChefs.php");
    
    }

header("Location: ../Backend_file/allChefs.php");

