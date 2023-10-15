<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM chefs WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$chef = mysqli_fetch_assoc($res);
?>


<div class="container-fluid">
    <form action="../controller/updateChefs.php" method="post" enctype="multipart/form-data">
    <div class="card">
            <div class="card-header">Edit CHEFS</div>
            <div class="card-body ">
                <input name="id" value="<?=$chef['id']?>" type="hidden">
                <input name="chefs_name" value="<?=$chef['chefs_name']?>" type="text" class="form-control my-2" placeholder="Enter Your chefs_name">
                
                <input name="titel" value="<?=$chef['titel']?>" type="text" class="form-control my-2" placeholder="Enter Your Titel">
               
                <input name="heading" value="<?=$chef['heading']?>" type="text" class="form-control my-2" placeholder="Enter Your heading">
                
                <textarea name="detail"  class="form-control my-2" placeholder="Enter Your Detail"><?=$chef['detail']?></textarea>
                
                <div class="row mx-0">
                    <input name="twitter_link" value="<?=$chef['twitter_link']?>" placeholder=" twitter_link" type="text" class="form-control my-2 col-lg-6">
                    <input name="facebook_link" value="<?=$chef['facebook_link']?>" placeholder="facebook_link" type="text" class="form-control my-2 col-lg-6 ">
                    <input name="instragram_link" value="<?=$chef['instragram_link']?>" placeholder="instragram_link" type="text" class="form-control my-2 col-lg-6">
                    <input name="linkedin_link" value="<?=$chef['linkedin_link']?>" placeholder="linkedin_link" type="text" class="form-control my-2 col-lg-6">
                    <input name="chefs_img" type="file" value="<?=$chef['chefs_img']?>" class="form-control my-2 ">
                </div>

                
                <button class="btn btn-primary">Update Chefs</button>
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