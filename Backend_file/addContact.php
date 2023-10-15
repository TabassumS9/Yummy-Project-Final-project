<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/store_contact.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD CONTACT</div>
            <div class="card-body ">

                <input name="map_link" placeholder="Map Link" type="text" class="form-control my-2 ">
                <input name="address" placeholder="Address" type="text" class="form-control my-2 ">
                <input name="email" placeholder="Email" type="email" class="form-control my-2 ">
                <input name="phone_number" placeholder="phone_number" type="text" class="form-control my-2 ">
                <input name="opening_hours" placeholder="opening_hours" type="text" class="form-control my-2 ">

               
                <button class="btn btn-primary">Submit</button>
            </div>
            
        </div>
    </form>
</div>


<?php

include "./backend_inc/footer.php"
?>