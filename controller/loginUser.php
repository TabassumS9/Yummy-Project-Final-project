<?php
session_start();
include "../database/env.php";

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$errors = [];

if(empty($email)){
    $errors['email_error'] = "Please Enter Your Email";
}
if(empty($password)){
    $errors['password_error'] = "Please Enter Your Password";
}



if(count($errors) > 0){
    $_SESSION['form_errors'] = $errors;
    header("Location: ../Backend_file/login.php");
}
else{
    //checking email
    $query = "SELECT * FROM foods WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    

    if(mysqli_num_rows($result) > 0){
        $correctPassword = password_verify($password,$user['Password']);
        if($correctPassword){
            $_SESSION['auth'] = $user;
            header("Location: ../Backend_file/index.php");
        }
        else{
            $errors['password_error'] = "Wrong Password";
            $_SESSION['form_errors'] = $errors;
            header("Location: ../Backend_file/login.php");
        }
    }
    else{
        $errors['email_error'] = "Wrong Emaill Address";
        $_SESSION['form_errors'] = $errors;
        header("Location: ../Backend_file/login.php");
    }
    
}
