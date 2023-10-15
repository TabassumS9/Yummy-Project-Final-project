<?php
include "../database/env.php";
session_start();

$id = $_REQUEST['id'];
$titel = $_REQUEST['titel'];
$price = $_REQUEST['price'];
$detail = $_REQUEST['detail'];
$event_img = $_FILES['event_img'];


if($event_img['size']>0){
    $extension = pathinfo($event_img['name'])['extension'];
    $fileName = "Events-" . uniqid() .".$extension";
    $path = "../uploads/events";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads =  move_uploaded_file($event_img['tmp_name'],"../uploads/events/". $fileName);
        $query = "SELECT event_img FROM events WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        $previousAbout = mysqli_fetch_assoc($res);
        $path = "../uploads/events/" . $previousAbout['event_img'];


        if(file_exists($path)){
            unlink($path);
        }

        $query = "UPDATE events SET titel='$titel',price='$price',detail='$detail',event_img='$fileName' WHERE id='$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/allEvents.php");

    }
    
    else{
        $query = "UPDATE events SET titel='$titel',price='$price',detail='$detail',event_img='$fileName' WHERE id='$id'";
        $res = mysqli_query($conn,$query);
        var_dump($res);
        header("Location: ../Backend_file/allEvents.php");
    
    }

header("Location: ../Backend_file/allEvents.php");

