<?php

include "../database/env.php";

$id = $_REQUEST['id'];
$query = "SELECT event_img FROM events WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$deleteTestimonial = mysqli_fetch_assoc($res);



$path = "../uploads/events/" . $deleteTestimonial['event_img'];


if(file_exists($path)){
    unlink($path);
}

$query = "DELETE FROM events WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allEvents.php");