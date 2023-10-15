<?php
include "../database/env.php";
session_start();
$id = $_REQUEST['id'];
$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$opening_hours = $_REQUEST['opening_hours'];
$twitter_link = $_REQUEST['twitter_link'];
$facebook_link = $_REQUEST['facebook_link'];
$instragram_link = $_REQUEST['instragram_link'];
$linkedin_link = $_REQUEST['linkedin_link'];
$copy_right = $_REQUEST['copy_right'];


    $query = "UPDATE footers SET address='$address',phone='$phone',email='$email',opening_hours='$opening_hours',twitter_link='$twitter_link',facebook_link='$facebook_link',instragram_link='$instragram_link',linkedin_link='$linkedin_link',copy_right='$copy_right' WHERE id = '$id'";
    $res = mysqli_query($conn,$query);
    var_dump($res);



header("Location: ../Backend_file/allFooter.php");

