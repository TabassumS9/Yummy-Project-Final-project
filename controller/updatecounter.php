<?php
include "../database/env.php";


$id = $_REQUEST['id'];

// Counter 1

$number_1 = $_REQUEST['number_1'];
$titel_1 = $_REQUEST['titel_1'];




$query = "UPDATE counters SET number_1='$number_1',titel_1='$titel_1' WHERE id = '$id'";
$res = mysqli_query($conn,$query);
var_dump($res);
header("Location: ../Backend_file/counterAll.php");

 
