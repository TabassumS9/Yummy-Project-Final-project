<?php
include "./backend_inc/header.php";
include "../database/env.php";

$query = "SELECT id,titel,about_img, about_img_sub, status FROM abouts";
$res = mysqli_query($conn,$query);
$about_img = mysqli_fetch_all($res,1);



?>
<div class="container-fluid">
    <table class="table  text-center" >
        <tr>
            <td>ID</td>
            <td>About_image</td>
            <td>About_sub_image</td>
            <td>Titel</td>
            <td>Featured</td>
            <td>Action</td>
        </tr>
        
        <?php

        foreach($about_img as $key=> $about){ ?>
            <tr>
                <td><?=++$key?></td>
                <td><img src="../uploads/abouts/<?=$about['about_img']?>" alt="" width="50px"></td>
                <td><img src="../uploads/abouts/<?=$about['about_img_sub']?>" alt="" width="50px"></td>
                <td><?= $about['titel']?></td>
                <td>
                    <a href="../controller/aboutStatusUpadate.php?id=<?=$about['id']?>">
                    <span class="text-warning">
                        <i class="far <?= $about['status'] == 1 ? "fas" : "far" ?> fa-star"></i>
                    </span>
                    </a>
                </td>
                <td>
                <a class="btn btn-dark" href="./editAbout.php?id=<?=$about['id']?>">Edit</a>
                <a class="btn btn-primary btnDelete" href="../controller/deleteAbout.php?id=<?=$about['id']?>">Delete</a>
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
