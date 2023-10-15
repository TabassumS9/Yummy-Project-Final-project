<?php
session_start();
include "../database/env.php";


$id = $_REQUEST['id'];

$query = "UPDATE abouts SET status = 0";
$res = mysqli_query($conn,$query);

$query = "UPDATE abouts SET status = 1 WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/aboutallBanners.php");