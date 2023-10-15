<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM gallery_img WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$gallery = mysqli_fetch_assoc($res);
?>


<div class="container-fluid">
    <form action="../controller/updateGallery.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">EDIT Gallery</div>
            <div class="card-body ">
                <input name="id" value="<?=$gallery['id']?>" type="hidden">
                <input name="gallery_img" value="<?=$gallery['gallery_img']?>" type="file" class="form-control my-2">
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