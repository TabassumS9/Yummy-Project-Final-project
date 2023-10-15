<?php
include "./backend_inc/header.php";
include "../database/env.php";


$query = "SELECT id, address, phone, email, status FROM footers";

$res = mysqli_query($conn,$query);

$footers = mysqli_fetch_all($res,1);


?>
<div class="container-fluid">
    <table class="table  text-center" >
        <tr>
            <td>ID</td>
            <td>phone</td>
            <td>email</td>
            <td>Featured</td>
            <td>Action</td>
        </tr>
        
        <?php

        foreach($footers as $key=> $footer){ ?>
            <tr>
                <td><?=++$key?></td>
                <td><?= $footer['phone']?></td>
                <td><?= $footer['email']?></td>
                <td>
                    <a href="../controller/footerStatusUpadate.php?id=<?=$footer['id']?>">
                    <span class="text-warning">
                        <i class="far <?= $footer['status'] == 1 ? "fas" : "far" ?> fa-star"></i>
                    </span>
                    </a>
                </td>
                <td>
                <a class="btn btn-dark" href="./editfooter.php?id=<?=$footer['id']?>">Edit</a>
                <a class="btn btn-primary btnDelete" href="../controller/deletefooter.php?id=<?=$footer['id']?>">Delete</a>
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
