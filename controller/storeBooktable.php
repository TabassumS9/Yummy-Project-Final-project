<?php
session_start();
include "../database/env.php";

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$date = $_REQUEST['date'];
$time = $_REQUEST['time'];
$people = $_REQUEST['people'];
$detail = $_REQUEST['detail'];
// $bookTable_img = $_FILES['bookTable_img'];

// $extension = pathinfo($bookTable_img['name']) ['extension'];
// $fileName = "Book_Table_img-" . uniqid() .".$extension";

// //file make
// $path = "../uploads/bookTableImage";
// if(!is_dir($path)){
//     mkdir($path);
// }
// $uploaded_file = move_uploaded_file($bookTable_img['tmp_name'],"../uploads/bookTableImage/$fileName");


// if($uploaded_file){

    $query = "INSERT INTO booktables(name, email, phone, date, time, people, detail) VALUES ('$name','$email','$phone','$date','$time','$people','$detail')";
    $res = mysqli_query($conn,$query);
    var_dump($res);
// }
header("Location: ../index.php");
