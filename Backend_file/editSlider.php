<?php
include "./backend_inc/header.php";
include "../database/env.php";
$id = $_REQUEST['id'];
// var_dump($id);
$query = "SELECT * FROM sliders WHERE id = '$id'";
$res = mysqli_query($conn,$query);

$editSlider = mysqli_fetch_assoc($res);
?>



<div class="container-fluid">
    <form action="../controller/updateSlider.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">EDIT SLIDER</div>
            
            <div class="row">
            <div class="card-body col-lg-12">
                <h4>Slider</h4>
                <!-- <input name="id_1" type="hidden"> -->
                <input name="id" value="<?=$editSlider['id']?>" type="hidden">
                <input name="titel_1" value="<?=$editSlider['titel_1']?>" class="form-control my-2" placeholder="Enter Your Titel">
                <input name="sliderBtn"  value="<?=$editSlider['sliderBtn']?>"type="text" class="form-control my-2" placeholder="Enter Your Slider Button">
                <div class="row mx-0" >
                    <textarea  name="detail_1"  placeholder="Enter Your Detail" type="text" class="form-control my-2 "><?=$editSlider['detail_1']?></textarea>
                </div>
                <input name="icon_2" value="<?=$editSlider['icon_2']?>" type="file" class="form-control my-2" placeholder="Enter Your icon_2">
                <input name="titel_2" value="<?=$editSlider['titel_2']?>" class="form-control my-2" placeholder="Enter Your titel_2">
                <div class="row mx-0" >
                    <textarea  name="detail_2"  placeholder="Enter Your Detail_2" type="text" class="form-control my-2 "><?=$editSlider['detail_2']?></textarea>
                    
                </div>
                
            </div>
            
            </div>
            <button class="btn btn-primary">Update Slider</button>
            
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