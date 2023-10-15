<?php

include "../database/env.php";

$id = $_REQUEST['id'];


$query = "DELETE FROM contact WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/allContact.php");