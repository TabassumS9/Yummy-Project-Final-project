<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM contact WHERE id = '$id'";
$res = mysqli_query($conn,$query);
$contact = mysqli_fetch_assoc($res);
?>

<div class="container-fluid">
    <form action="../controller/updateContact.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">EDIT Contact</div>
            <div class="card-body ">
                <input name="id" value="<?=$contact['id']?>" type="hidden">
                <input name="map_link" value="<?=$contact['map_link']?>"  placeholder="Map Link" type="text" class="form-control my-2 ">
                <input name="address" value="<?=$contact['address']?>"  placeholder="Address" type="text" class="form-control my-2 ">
                <input name="email" value="<?=$contact['email']?>"  placeholder="Email" type="email" class="form-control my-2 ">
                <input name="phone_number" value="<?=$contact['phone_number']?>"  placeholder="phone_number" type="text" class="form-control my-2 ">
                <input name="opening_hours" value="<?=$contact['opening_hours']?>"  placeholder="opening_hours" type="text" class="form-control my-2 ">

               
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