<?php
include "./backend_inc/header.php";
include "../database/env.php";
$query = "SELECT id, titel_1, icon_2, titel_2, status FROM sliders";

// $res = mysqli_query($conn,$query);
$res = mysqli_query($conn,$query);
$icons = mysqli_fetch_all($res,1);

?>
<div class="container-fluid">
    <table class="table  text-center" >
        <tr>
            <td>ID</td>
            <td>icon_2</td>
            <td>titel_1</td>
            <td>titel_2</td>
            <td>Featured</td>
            <td>Action</td>
        </tr>
        
        <?php

        foreach($icons as $key=> $icon){ ?>
            <tr>
                <td><?=++$key?></td>
                <td><img src="../uploads/sliders/<?=$icon['icon_2']?>" alt="" width="50px"></td>
                <td><?=$icon['titel_1']?></td>
                <td><?=$icon['titel_2']?></td>
                <td>
                    <a href="../controller/SliderStatusupdate.php?id=<?=$icon['id']?>">
                    <span class="text-warning">
                        <i class="far <?= $icon['status'] == 1 ? "fas" : "far" ?> fa-star"></i>
                    </span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-dark" href="./editSlider.php?id=<?=$icon['id']?>">Edit</a>
                    <a class="btn btn-primary btnDelete" href="../controller/deleteslider.php?id=<?=$icon['id']?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        
    </table>
</div>
<?php
include "./backend_inc/footer.php"
?>