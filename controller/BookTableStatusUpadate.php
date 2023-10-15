<?php
session_start();
include "../database/env.php";


$id = $_REQUEST['id'];

$query = "UPDATE booktables SET status = 0";
$res = mysqli_query($conn,$query);

$query = "UPDATE booktables SET status = 1 WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allBookTable.php");