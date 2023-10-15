<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM abouts WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$editabout = mysqli_fetch_assoc($res);
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
                min-height: 200px;

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
    <form action="../controller/updateAbout.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">EDIT ABOUT</div>
            <div class="card-body ">
                <input name="id" value="<?=$editabout['id']?>" type="hidden">
                <input name="heading" value="<?=$editabout['heading']?>" type="text" class="form-control my-2" placeholder="Enter Your Heading">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                <input name="titel" value="<?=$editabout['titel']?>" class="form-control my-2" placeholder="Enter Your Titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <div class="row mx-0" >
                    <textarea class="content" style="width: 100%;height:200px;" name="detail"  placeholder="Enter Your Detail" type="text" class="form-control my-2 "><?=$editabout['detail']?></textarea>
                    <span class="text-danger " ><?= isset($_SESSION['banner_errors']['cta_titel_error']) ? $_SESSION['banner_errors']['cta_titel_error'] : ''?></span> 
                </div>
                <input name="cta_video" value="<?=$editabout['cta_video']?>" placeholder="CTA video" type="text" class="form-control my-2 ">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['cta_link_error']) ? $_SESSION['banner_errors']['cta_link_error'] : ''?></span>
                <input name="img_book_table" value="<?=$editabout['img_book_table']?>" placeholder="Enter Your Image Book Table" type="text" class="form-control my-2 ">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['cta_link_error']) ? $_SESSION['banner_errors']['cta_link_error'] : ''?></span> 
                <input name="img_book_sub_table" value="<?=$editabout['img_book_sub_table']?>" placeholder="Enter Your Image Book  Sub Table" type="text" class="form-control my-2 ">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['cta_link_error']) ? $_SESSION['banner_errors']['cta_link_error'] : ''?></span> 
                <input name="about_img" value="<?=$editabout['about_img']?>" type="file" class="form-control my-2">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['banner_img_error']) ? $_SESSION['banner_errors']['banner_img_error'] : ''?></span> 
                <input name="about_img_sub" value="<?=$editabout['about_img_sub']?>" type="file" class="form-control my-2">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['banner_img_error']) ? $_SESSION['banner_errors']['banner_img_error'] : ''?></span> 
                <button class="btn btn-primary">Update About </button>
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