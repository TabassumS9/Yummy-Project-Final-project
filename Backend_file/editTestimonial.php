<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM testimonials WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$testimonial = mysqli_fetch_assoc($res);
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
    <form action="../controller/updateTestimonial.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">EDIT Testimonial</div>
            <div class="card-body ">
                <input name="id" value="<?=$testimonial['id']?>" type="hidden">
                <input name="heading" value="<?=$testimonial['heading']?>" type="text" class="form-control my-2" placeholder="Enter Your Heading">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                <input name="titel" value="<?=$testimonial['titel']?>" class="form-control my-2" placeholder="Enter Your Titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <div class="row mx-0" >
                    <textarea class="content" style="width: 100%;height:200px;" name="detail"  placeholder="Enter Your Detail" type="text" class="form-control my-2 "><?=$testimonial['detail']?></textarea>
                    <span class="text-danger " ><?= isset($_SESSION['banner_errors']['cta_titel_error']) ? $_SESSION['banner_errors']['cta_titel_error'] : ''?></span> 
                </div>
                <input name="client_name" value="<?=$testimonial['client_name']?>" placeholder=" client_name" type="text" class="form-control my-2 ">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['cta_link_error']) ? $_SESSION['banner_errors']['cta_link_error'] : ''?></span>
                <input name="client_position" value="<?=$testimonial['client_position']?>" placeholder="Enter Your client_position" type="text" class="form-control my-2 ">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['cta_link_error']) ? $_SESSION['banner_errors']['cta_link_error'] : ''?></span> 
                <input name="testimonial_img" value="<?=$testimonial['testimonial_img']?>" type="file" class="form-control my-2">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['banner_img_error']) ? $_SESSION['banner_errors']['banner_img_error'] : ''?></span> 
                <button class="btn btn-primary">Update Testimonial </button>
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