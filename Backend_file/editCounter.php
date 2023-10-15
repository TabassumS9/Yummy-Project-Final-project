<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
// var_dump($id);
$query = "SELECT * FROM counters WHERE id = '$id'";
$res = mysqli_query($conn,$query);

$editCounter = mysqli_fetch_assoc($res);
?>



<div class="container-fluid">
    <form action="../controller/updatecounter.php" method="post" >
        <div class="card">
            
        <div class="card-header"> ADD COUNTER</div>
            <div class="row">
            <div class="card-body col-lg-3">
                <h4>Counter 1</h4>
                <input name="id" value="<?=$editCounter['id']?>" type="hidden">
                 
                <input name="number_1" value="<?=$editCounter['number_1']?>" class="form-control my-2" placeholder="Enter Your number">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <input name="titel_1" value="<?=$editCounter['titel_1']?>" type="text" class="form-control my-2" placeholder="Enter Your titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span>
                
                
            </div>
            <div class="card-body col-lg-3">
                <h4>Counter 2</h4>
                <input name="id" value="<?=$editCounter['id']?>" type="hidden">
                 
                <input name="number_2" value="<?=$editCounter['number_2']?>" class="form-control my-2" placeholder="Enter Your number">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <input name="titel_2" value="<?=$editCounter['titel_2']?>" type="text" class="form-control my-2" placeholder="Enter Your titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span>
                
                
            </div>
            <div class="card-body col-lg-3">
                <h4>Counter 3</h4>
                <input name="id" value="<?=$editCounter['id']?>" type="hidden">
                 
                <input name="number_3" value="<?=$editCounter['number_3']?>"  class="form-control my-2" placeholder="Enter Your number">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <input name="titel_3" value="<?=$editCounter['titel_3']?>"  type="text" class="form-control my-2" placeholder="Enter Your titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span>
                
                
            </div>
            <div class="card-body col-lg-3">
                <h4>Counter 4</h4>
                <input name="id" value="<?=$editCounter['id']?>" type="hidden">
                 
                <input name="number_4" value="<?=$editCounter['number_4']?>"  class="form-control my-2" placeholder="Enter Your number">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <input name="titel_4" value="<?=$editCounter['titel_4']?>"  type="text" class="form-control my-2" placeholder="Enter Your titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span>
                
                
            </div>
            
            
            
            </div>
            <button class="btn btn-primary">update counter</button>
            
        </div>
    </form>
</div>


<?php
unset($_SESSION['banner_errors']);
include "./backend_inc/footer.php"
?>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>