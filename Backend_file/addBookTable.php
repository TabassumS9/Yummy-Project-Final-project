<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/storeBooktable.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD Book Table</div>
            <div class="card-body row mx-0 ">
                <input name="name" type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your Name">
                <input name="email" type="email" class="form-control my-2 col-lg-4" placeholder="Enter Your email">
                <input name="phone" type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your phone">
                <input name="date" type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your date">
                <input name="time" type="text" class="form-control my-2 col-lg-4" placeholder="Enter Your time">
                <input name="people" type="number" class="form-control my-2 col-lg-4" placeholder="Enter Your people">
                <textarea name="detail" class="form-control my-2" placeholder="Enter Your Detail"></textarea>
                <input name="bookTable_img" type="file" class="form-control my-2">
                <button class="btn btn-primary">Add Book Table</button>
            </div>
            
        </div>
    </form>
</div>


<?php

include "./backend_inc/footer.php"
?>