<?php
session_start();
include "../database/env.php";

$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$opening_hours = $_REQUEST['opening_hours'];
$twitter_link = $_REQUEST['twitter_link'];
$facebook_link = $_REQUEST['facebook_link'];
$instragram_link = $_REQUEST['instragram_link'];
$linkedin_link = $_REQUEST['linkedin_link'];
$copy_right = $_REQUEST['copy_right'];



    $query = "INSERT INTO footers(address, phone, email, opening_hours, twitter_link, facebook_link, instragram_link, linkedin_link, copy_right) VALUES ('$address','$phone','$email','$opening_hours','$twitter_link','$facebook_link','$instragram_link','$linkedin_link','$copy_right')";
    $res = mysqli_query($conn,$query);
    var_dump($res);

header("Location: ../Backend_file/allFooter.php");