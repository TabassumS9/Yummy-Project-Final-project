<?php
include "../database/env.php";
session_start();

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$date = $_REQUEST['date'];
$time = $_REQUEST['time'];
$people = $_REQUEST['people'];
$detail = $_REQUEST['detail'];
$bookTable_img = $_FILES['bookTable_img'];



if($bookTable_img['size']>0){
    $extension = pathinfo($bookTable_img['name'])['extension'];
    $fileName = "Book_Table_img-" . uniqid() .".$extension";
    $path = "../uploads/bookTableImage";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads =  move_uploaded_file($bookTable_img['tmp_name'],"../uploads/bookTableImage/". $fileName);
        $query = "SELECT bookTable_img FROM booktables WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        $previousAbout = mysqli_fetch_assoc($res);
        $path = "../uploads/bookTableImage/" . $previousAbout['bookTable_img'];


        if(file_exists($path)){
            unlink($path);
        }

        $query = "UPDATE booktables SET name='$name',email='$email',phone='$phone',date='$date',time='$time',people='$people',detail='$detail',bookTable_img='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/allBookTable.php");

    }
    
    else{
        $query = "UPDATE booktables SET name='$name',email='$email',phone='$phone',date='$date',time='$time',people='$people',detail='$detail',bookTable_img='$fileName' WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/allBookTable.php");
    
    }

header("Location: ../Backend_file/allBookTable.php");

