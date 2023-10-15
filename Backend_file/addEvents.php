<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/store_events.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD EVENTS</div>
            <div class="card-body ">
                <input name="titel" type="text" class="form-control my-2" placeholder="Enter Your Titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                <input name="price" type="text" class="form-control my-2" placeholder="Enter Your price">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                <textarea name="detail" class="form-control my-2" placeholder="Enter Your Detail"></textarea>
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                
                <input name="event_img" type="file" class="form-control my-2">
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