<?php

include "../database/env.php";

$id = $_REQUEST['id'];



$query = "DELETE FROM counters WHERE id = '$id'";
$res = mysqli_query($conn,$query);
header("Location: ../Backend_file/counterAll.php");