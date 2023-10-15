<?php
include "./backend_inc/header.php";
include "../database/env.php";



$query= "SELECT id, number_1, titel_1, status FROM counters";
$res = mysqli_query($conn,$query);
$counters = mysqli_fetch_all($res,1);

?>
<div class="container-fluid">
    <table class="table  text-center" >
        <tr>
            <td>ID</td>
            <td>Number1</td>
            <td>titel1</td>
            <td>Featured</td>
            <td>Action</td>
        </tr>
        
  
        <?php

        foreach($counters as $key=> $counter){ ?>
            <tr>
                <td><?=++$key?></td>
                <td><?=$counter['number_1']?></td>
                <td><?=$counter['titel_1']?></td>
                <td>
                    <a href="../controller/counterStatusupdate.php?id=<?=$counter['id']?>">
                    <span class="text-warning">
                        <i class="far <?= $counter['status'] == 1 ? "fas" : "far" ?> fa-star"></i>
                    </span>
                    </a>
                </td>
                <td>
                    <a class="btn btn-dark" href="./editCounter.php?id=<?=$counter['id']?>">Edit</a>
                    <a class="btn btn-primary btnDelete" href="../controller/deleteCounter.php?id=<?=$counter['id']?>">Delete</a>
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