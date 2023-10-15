<?php

include "../database/env.php";

$id = $_REQUEST['id'];
$query = "SELECT bookTable_img FROM booktables WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$deleteBooktables = mysqli_fetch_assoc($res);



$path = "../uploads/chefs/" . $deleteBooktables['bookTable_img'];


if(file_exists($path)){
    unlink($path);
}

$query = "DELETE FROM booktables WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allBookTable.php");