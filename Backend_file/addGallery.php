<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/store_gallery.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD GALLERY IMAGE</div>
            <div class="card-body ">

                <input name="gallery_img" type="file" class="form-control my-2">
               
                <button class="btn btn-primary">Submit</button>
            </div>
            
        </div>
    </form>
</div>


<?php

include "./backend_inc/footer.php"
?>