<?php
include "../database/env.php";
session_start();

$id = $_REQUEST['id'];
$heading = $_REQUEST['heading'];
$titel = $_REQUEST['titel'];
$detail = $_REQUEST['detail'];
$client_name = $_REQUEST['client_name'];
$client_position = $_REQUEST['client_position'];
$testimonial_img = $_FILES['testimonial_img'];



if($testimonial_img['size']>0){
    $extension = pathinfo($testimonial_img['name'])['extension'];
    $fileName = "Testimonial-" . uniqid() .".$extension";
    $path = "../uploads/testimonials";
    if(!is_dir($path)){
        mkdir($path);
    }
    $uploads =  move_uploaded_file($testimonial_img['tmp_name'],"../uploads/testimonials/". $fileName);
        $query = "SELECT testimonial_img FROM testimonials WHERE id = '$id'";
        $res = mysqli_query($conn,$query);
        $previousAbout = mysqli_fetch_assoc($res);
        $path = "../uploads/testimonials/" . $previousAbout['testimonial_img'];


        if(file_exists($path)){
            unlink($path);
        }

        
        $query = "UPDATE testimonials SET heading='$heading',titel='$titel',detail='$detail',client_name='$client_name',client_position='$client_position',testimonial_img='$fileName' WHERE id = '$id'";
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

header("Location: ../Backend_file/allTestimonial.php");

