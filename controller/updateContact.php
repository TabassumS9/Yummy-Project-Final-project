<?php
include "../database/env.php";
session_start();

$id = $_REQUEST['id'];
$map_link = $_REQUEST['map_link'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
$phone_number = $_REQUEST['phone_number'];
$opening_hours = $_REQUEST['opening_hours'];


$query = "UPDATE contact SET map_link='$map_link',address='$address',email='$email',phone_number='$phone_number',opening_hours='$opening_hours' WHERE id = '$id'";
$res = mysqli_query($conn,$query);
var_dump($res);
header("Location: ../Backend_file/allContact.php");



