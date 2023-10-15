<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/store_footer.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD FOOTER</div>
            <div class="card-body row">

                <input name="address" placeholder="address" type="text" class="form-control my-2 ">
                <input name="phone" placeholder="phone" type="text" class="form-control my-2 ">
                <input name="email" placeholder="Email" type="email" class="form-control my-2 ">
                <input name="opening_hours" placeholder="opening_hours" type="text" class="form-control my-2 ">
                <input name="twitter_link" placeholder="twitter_link" type="text" class="form-control my-2 col-lg-6 ">
                <input name="facebook_link" placeholder="facebook_link" type="text" class="form-control my-2  col-lg-6">
                <input name="instragram_link" placeholder="instragram_link" type="text" class="form-control my-2  col-lg-6">
                <input name="linkedin_link" placeholder="linkedin_link" type="email" class="form-control my-2 col-lg-6 ">
                <input name="copy_right" placeholder="copy_right" type="text" class="form-control my-2 ">

               
                <button class="btn btn-primary">Submit</button>
            </div>
            
        </div>
    </form>
</div>


<?php

include "./backend_inc/footer.php"
?>