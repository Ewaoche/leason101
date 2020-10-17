<?php
  include 'includes/header.php';

 require_once './app/Dbconnection.php';
 $opert = new Operation();


  $result = $opert->runUpdate();
//   die(var_dump($result));
  if($result){
    header('location:view.php');
  }

  if(isset($_GET['eid']))
  {
    $id =  $_GET['eid']; 
    $getUser = $opert->getUser($id);

  }
  

?>
   

      <div class="container"> 
          <div class="row">
            <div class="col-lg-6 m-auto" >
                <div class="card mt-3">
                   <div class="card-header text-center">
                    <h2>Edit Users</h2>
                   </div>
                   <div class="card-body">
                       <form action="edit.php" method="post">
                       <input type="hidden" value="<?= $getUser->id ?>" name="id">
                       <div class="form-group">
                        <input type="text" class="form-control" name="username" value="<?= $getUser->username ?>" >
                       </div>
                       <div class="form-group">
                        <input type="text" class="form-control" name="password" value="<?= $getUser->password ?>">
                       </div>
                       <div class="form-group">
                        <input type="email" class="form-control" name="email" value="<?= $getUser->email ?>">
                       </div>
                       <div class="form-group">
                        <input type="text" class="form-control" name="firstname" value="<?= $getUser->firstname ?>">
                       </div>
                       <div class="form-group">
                        <input type="text" class="form-control" name="lastname" value="<?= $getUser->lastname ?>">
                       </div>
                       <button class="btn btn-primary" name="update_btn">Update</button>
                       </form>
                   </div>
                </div>
            </div>
          </div> 
      </div>
      
    