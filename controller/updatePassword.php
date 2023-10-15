<?php
session_start();
include "../database/env.php";

$id = $_SESSION['auth']['id'];
$oldpassword = $_REQUEST['oldpassword'];
$newpassword = $_REQUEST['newpassword'];
$confirmpassword = $_REQUEST['confirmpassword'];
$encpassword = password_hash($newpassword, PASSWORD_BCRYPT);
$errors = [];


$query = "SELECT * FROM foods WHERE id = '$id'"; 
$res = mysqli_query($conn,$query);
$user = mysqli_fetch_assoc($res);

// print_r($user);
$is_verify = password_verify($oldpassword,$user['Password']);
if($is_verify){
    if($newpassword == $confirmpassword){
        //moving forward
        $query = "UPDATE foods SET Password='$encpassword' WHERE id = '$id'";
        $result = mysqli_query($conn,$query);
        header(("Location: ../Backend_file/profile.php"));

    }
    else{
        $errors['newpassword_error'] = "Incorrect Password";
        $_SESSION['password_errors'] = $errors;
        header(("Location: ../Backend_file/profile.php"));
    }
}
else{
    $errors['oldpassword_error'] = "Incorrect Password";
    $_SESSION['password_errors'] = $errors;
    header(("Location: ../Backend_file/profile.php"));
}

