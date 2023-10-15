<?php
include "../database/env.php";
include "./backend_inc/header.php";
$query = "SELECT * FROM categories ";
$res = mysqli_query($conn,$query);
$categories = mysqli_fetch_all($res,1);

?>
<div class="container-fluid">
    <form action="../controller/storeFoods.php" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">ADD Foods</div>
            <div class="card-body ">
                <input name="titel" type="text" class="form-control my-2" placeholder="Enter Your Titel">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['titel_error']) ? $_SESSION['banner_errors']['titel_error'] : ''?></span> 
                <textarea name="detail" class="form-control my-2" placeholder="Enter Your Detail"></textarea>
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['detail_error']) ? $_SESSION['banner_errors']['detail_error'] : ''?></span> 
                <div class="row mx-0 align-items-center" >
                    <input name="price" placeholder="Price " type="text" class="form-control my-2 col-lg-10 ">
                    <span class="text-danger " ><?= isset($_SESSION['banner_errors']['cta_titel_error']) ? $_SESSION['banner_errors']['cta_titel_error'] : ''?></span> 
                    <select name="category" class="form-control col-lg-2">
                        
                        <?php
                        foreach($categories as $category){?>
                            <option value=" <?= $category['id'] ?> "><?=$category['titel']?></option><?php
                        }
                        ?>
                    </select>
                    
                </div>
                <input name="food_img" type="file" class="form-control my-2">
                <span class="text-danger"><?= isset($_SESSION['banner_errors']['banner_img_error']) ? $_SESSION['banner_errors']['banner_img_error'] : ''?></span> 
                <button class="btn btn-primary">Add Foods</button>
            </div>
            
        </div>
    </form>
</div>


<?php
unset($_SESSION['banner_errors']);
include "./backend_inc/footer.php"
?>