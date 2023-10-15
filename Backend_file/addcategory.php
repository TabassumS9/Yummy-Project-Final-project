<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/storeMenu.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD CATEGORIES</div>
            <div class="card-body ">
                <input name="titel" type="text" class="form-control my-2" placeholder="Enter Your Titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                
                <button class="btn btn-primary">Add categories</button>
            </div>
            
        </div>
    </form>
</div>


<?php
unset($_SESSION['banner_errors']);
include "./backend_inc/footer.php"
?>