<?php

include "../database/env.php";

$id = $_REQUEST['id'];
$query = "SELECT testimonial_img FROM testimonials WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$deleteTestimonial = mysqli_fetch_assoc($res);



$path = "../uploads/testimonials/" . $deleteTestimonial['testimonial_img'];


if(file_exists($path)){
    unlink($path);
}

$query = "DELETE FROM testimonials WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allTestimonial.php");