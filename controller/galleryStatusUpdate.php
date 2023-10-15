<?php
session_start();
include "../database/env.php";


$id = $_REQUEST['id'];

$query = "UPDATE gallery_img SET status = 1";
$res = mysqli_query($conn,$query);

$query = "UPDATE gallery_img SET status = 1 WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allGallery.php");