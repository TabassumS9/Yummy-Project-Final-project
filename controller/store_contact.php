<?php
session_start();
include "../database/env.php";

$map_link = $_REQUEST['map_link'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
$phone_number = $_REQUEST['phone_number'];
$opening_hours = $_REQUEST['opening_hours'];



$query = "INSERT INTO contact(map_link, address, email, phone_number, opening_hours) VALUES ('$map_link','$address','$email','$phone_number','$opening_hours')";
$res = mysqli_query($conn,$query);
var_dump($res);

header("Location: ../Backend_file/allContact.php");
