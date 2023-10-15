<?php


session_start();
include "../database/env.php";

$titel = $_REQUEST['titel'];
$query = "INSERT INTO categories(titel) VALUES ('$titel')";
$res = mysqli_query($conn,$query);
if($res){
    header("Location: ../Backend_file/addcategory.php");
}



header("Location: ../Backend_file/addFoods.php");