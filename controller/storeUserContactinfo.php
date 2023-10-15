<?php
session_start();
include "../database/env.php";

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$detail = $_REQUEST['detail'];

    $query = "INSERT INTO contactuserinfo(Name, email, subject, detail) VALUES ('$name','$email','$subject','$subject')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
header("Location: ../index.php");