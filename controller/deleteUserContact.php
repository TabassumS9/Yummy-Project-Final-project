<?php


include "../database/env.php";

$id = $_REQUEST['id'];


$query = "DELETE FROM contactuserinfo WHERE id = '$id'";
$res = mysqli_query($conn,$query);
var_dump($res);
header("Location: ../Backend_file/allUserContact.php");