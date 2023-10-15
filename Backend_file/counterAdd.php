<?php
include "./backend_inc/header.php"
?>
<div class="container-fluid">
    <form action="../controller/storecounter.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header"> ADD COUNTER</div>
            <div class="row">
            <div class="card-body col-lg-12">
                <h4>Counter 1</h4>
                <input name="id" type="hidden">
                 
                <input name="number_1" class="form-control my-2" placeholder="Enter Your number">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <input name="titel_1" type="text" class="form-control my-2" placeholder="Enter Your titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span>
                
                
            </div>
            
            
            
            
            </div>
            <button class="btn btn-primary">Add Slider</button>
            
        </div>
    </form>
</div>
<?php
unset($_SESSION['banner_errors']);
include "./backend_inc/footer.php"
?>