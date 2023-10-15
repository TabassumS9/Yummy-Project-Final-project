<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM events WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$events = mysqli_fetch_assoc($res);
?>

<style>
.ck-reset_all :not(.ck-reset_all-excluded *), .ck.ck-reset, .ck.ck-reset_all {
    box-sizing: border-box;
    position: static;
    width: 100%;

}
</style>
<style>
       .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 100px;

            }
</style>
<style>
    .ck-content .image {
                /* block images */
                max-width: 100%;
                margin: 20px ;
            }
</style>
<div class="container-fluid">
    <form action="../controller/updateEvents.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">EDIT Testimonial</div>
            <div class="card-body ">
                <input name="id" value="<?=$events['id']?>" type="hidden">
                <input name="titel" value="<?=$events['titel']?>" type="text" class="form-control my-2" placeholder="Enter Your Titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                <input name="price" value="$<?=$events['price']?>" type="text" class="form-control my-2" placeholder="Enter Your price">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                <textarea name="detail" class="form-control my-2" placeholder="Enter Your Detail"><?=$events['detail']?></textarea>
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                
                <input name="event_img" value="<?=$events['event_img']?>" type="file" class="form-control my-2">
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
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>