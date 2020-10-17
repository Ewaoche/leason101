<?php   include './includes/header.php';

require_once './app/Dbconnection.php';
$opert = new Operation();
 $getAllUsers = $opert->getAllUser();

?>


<div class="container">
   <div class="row mt-5">
      <div class="col-lg-12 col-sm-6 m-auto">
         <div class="card">
           <div class="card-header text-center">
             <h2>Registerd Users</h2>
           </div>
           <div class="card-body">
             <table class="table table-bordered">
               <tr>
                <td style="width:10%">ID</td>
                <td style="width:10%">User Name</td>
                <td style="width:10%">First Name</td>
                <td style="width:10%">Last Name</td>
                <td style="width:10%">Email Address</td>
                <td style="width:20%">
                  Actions
                </td>
               </tr>
               <tr>
               <?php while($getAllUser = mysqli_fetch_object($getAllUsers)):?>
               <td><?= $getAllUser->id ?></td>
               <td><?= $getAllUser->username ?></td>
               <td><?= $getAllUser->firstname ?></td>
               <td><?= $getAllUser->lastname ?></td>
               <td><?= $getAllUser->email ?></td>
               <td>
               <a href="edit.php?eid=<?= $getAllUser->id ?>" class="btn btn-success">Edit</a>
                <a href="delete.php?did=<?= $getAllUser->id ?>" id="first" class="btn btn-success">Delete</a>
               </td>           
               </tr>
               <?php endwhile;?>
             </table>
           </div>
         </div>
      </div>
   </div>
</div>
<?php include './includes/footer.php'; ?>

