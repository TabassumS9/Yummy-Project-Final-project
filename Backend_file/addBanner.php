<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/store_banner.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD BANNER</div>
            <div class="card-body ">
                <input name="titel" type="text" class="form-control my-2" placeholder="Enter Your Titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                <textarea name="detail" class="form-control my-2" placeholder="Enter Your Detail"></textarea>
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <div class="row mx-0" >
                    <input name="cta_titel" placeholder="CTA Titel" type="text" class="form-control my-2 ">
                    <span class="text-danger " ><?= isset($_SESSION['banner_errors']['cta_titel_error']) ? $_SESSION['banner_errors']['cta_titel_error'] : ''?></span> 
                    <input name="cta_link" placeholder="CTA Link" type="text" class="form-control my-2 ">
                    <span class="text-danger"><?= isset($_SESSION['banner_errors']['cta_link_error']) ? $_SESSION['banner_errors']['cta_link_error'] : ''?></span> 
                    <input name="video_link" placeholder="Video Link" type="text" class="form-control my-2 ">
                    <span class="text-danger"><?= isset($_SESSION['banner_errors']['video_link_error']) ? $_SESSION['banner_errors']['video_link_error'] : ''?></span> 
                </div>
                <input name="banner_img" type="file" class="form-control my-2">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['banner_img_error']) ? $_SESSION['banner_errors']['banner_img_error'] : ''?></span> 
                <button class="btn btn-primary">Submit</button>
            </div>
            
        </div>
    </form>
</div>


<?php
unset($_SESSION['banner_errors']);
include "./backend_inc/footer.php"
?>