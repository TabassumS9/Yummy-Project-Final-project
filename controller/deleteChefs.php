<?php

include "../database/env.php";

$id = $_REQUEST['id'];
$query = "SELECT chefs_img FROM chefs WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$deleteChefs = mysqli_fetch_assoc($res);



$path = "../uploads/chefs/" . $deleteChefs['chefs_img'];


if(file_exists($path)){
    unlink($path);
}

$query = "DELETE FROM chefs WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allChefs.php");