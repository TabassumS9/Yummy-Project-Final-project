<?php
session_start();
include "../database/env.php";


$id = $_REQUEST['id'];

$query = "UPDATE testimonials SET status = 1";
$res = mysqli_query($conn,$query);

$query = "UPDATE testimonials SET status = 0 WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allTestimonial.php");