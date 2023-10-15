<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM booktables WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$booktables = mysqli_fetch_assoc($res);
?>


<div class="container-fluid">
    <form action="../controller/updateBookTable.php" method="post" enctype="multipart/form-data">
    <div class="card">
    <div class="card-header">Edit Book Table</div>
            <div class="card-body row mx-0 ">
                <input name="id" value="<?=$booktables['id']?>" type="hidden">
                <input name="name" value = "<?=$booktables['name']?>"  type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your Name">
                <input name="email" value = "<?=$booktables['email']?>"  type="email" class="form-control my-2 col-lg-4" placeholder="Enter Your email">
                <input name="phone" value = "<?=$booktables['phone']?>"  type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your phone">
                <input name="date" value = "<?=$booktables['date']?>"  type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your date">
                <input name="time" value = "<?=$booktables['time']?>"  type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your time">
                <input name="people" value = "<?=$booktables['people']?>"  type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your people">
                <textarea name="detail"   class="form-control my-2" placeholder="Enter Your Detail"><?=$booktables['detail']?></textarea>
                <input name="bookTable_img" value = "<?=$booktables['bookTable_img']?>"  type="file" class="form-control my-2">
                <button class="btn btn-primary">Update Book Table</button>
            </div>
            
        </div>
    </form>
</div>


<?php

include "./backend_inc/footer.php"
?>
