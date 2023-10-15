<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/store_Chefs.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD CHEFS</div>
            <div class="card-body ">
                <input name="chefs_name" type="text" class="form-control my-2" placeholder="Enter Your chefs_name">
                
                <input name="titel" type="text" class="form-control my-2" placeholder="Enter Your Titel">
               
                <input name="heading" type="text" class="form-control my-2" placeholder="Enter Your heading">
                
                <textarea name="detail" class="form-control my-2" placeholder="Enter Your Detail"></textarea>
                
                <div class="row mx-0">
                    <input name="twitter_link" placeholder=" twitter_link" type="text" class="form-control my-2 col-lg-6">
                    <input name="facebook_link" placeholder="facebook_link" type="text" class="form-control my-2 col-lg-6 ">
                    <input name="instragram_link" placeholder="instragram_link" type="text" class="form-control my-2 col-lg-6">
                    <input name="linkedin_link" placeholder="linkedin_link" type="text" class="form-control my-2 col-lg-6">
                    <input name="chefs_img" type="file" class="form-control my-2 ">
                </div>

                
                <button class="btn btn-primary">Add Chefs</button>
            </div>
            
        </div>
    </form>
</div>


<?php
unset($_SESSION['banner_errors']);
include "./backend_inc/footer.php"
?>