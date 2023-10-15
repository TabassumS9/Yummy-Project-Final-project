<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM footers WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$footers = mysqli_fetch_assoc($res);
?>

<div class="container-fluid">
    <form action="../controller/updateFooter.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">EDIT Footer</div>
            <div class="card-body row ">
                <input name="id" value="<?=$footers['id']?>" type="hidden">
                <input name="address" value="<?=$footers['address']?>" placeholder="address" type="text" class="form-control my-2 ">
                <input name="phone" value="<?=$footers['phone']?>" placeholder="phone" type="text" class="form-control my-2 ">
                <input name="email" value="<?=$footers['email']?>" placeholder="Email" type="email" class="form-control my-2 ">
                <input name="opening_hours" value="<?=$footers['opening_hours']?>" placeholder="opening_hours" type="text" class="form-control my-2 ">
                <input name="twitter_link" value="<?=$footers['twitter_link']?>" placeholder="twitter_link" type="text" class="form-control my-2 col-lg-6 ">
                <input name="facebook_link" value="<?=$footers['facebook_link']?>" placeholder="facebook_link" type="text" class="form-control my-2  col-lg-6">
                <input name="instragram_link" value="<?=$footers['instragram_link']?>" placeholder="instragram_link" type="text" class="form-control my-2  col-lg-6">
                <input name="linkedin_link" value="<?=$footers['linkedin_link']?>" placeholder="linkedin_link" type="email" class="form-control my-2 col-lg-6 ">
                <input name="copy_right" value="<?=$footers['copy_right']?>" placeholder="copy_right" type="text" class="form-control my-2 ">


               
                <button class="btn btn-primary">UpdateSubmit</button>
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