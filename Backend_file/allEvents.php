<?php
include "./backend_inc/header.php";
include "../database/env.php";


$query = "SELECT id, titel, price, event_img, status FROM events";

$res = mysqli_query($conn,$query);

$events = mysqli_fetch_all($res,1);


?>
<div class="container-fluid">
    <table class="table  text-center" >
        <tr>
            <td>ID</td>
            <td>Events_img</td>
            <td>price</td>
            <td>titel</td>
            <td>Featured</td>
            <td>Action</td>
        </tr>
        
        <?php

        foreach($events as $key=> $event){ ?>
            <tr>
                <td><?=++$key?></td>
                <td><img src="../uploads/events/<?=$event['event_img']?>" alt="" width="50px"></td>
                <td>$<?= $event['price']?></td>
                <td><?= $event['titel']?></td>
                <td>
                    <a href="../controller/eventStatusUpadate.php?id=<?=$event['id']?>">
                    <span class="text-warning">
                        <i class="far <?= $event['status'] == 1 ? "fas" : "far" ?> fa-star"></i>
                    </span>
                    </a>
                </td>
                <td>
                <a class="btn btn-dark" href="./editEvents.php?id=<?=$event['id']?>">Edit</a>
                <a class="btn btn-primary btnDelete" href="../controller/deleteEvents.php?id=<?=$event['id']?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        
    </table>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$('.btnDelete').click(function(event){
    event.preventDefault()
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = $(this).attr('href');
  }
})
})
</script>
<?php
if(isset($_SESSION['msg'])){
    ?>
    <script>
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Successfully Updated'
})
</script>
<?php
}
?>
<?php
unset($_SESSION['banner_errors']);
include "./backend_inc/footer.php";
unset($_SESSION['msg']);
?>
