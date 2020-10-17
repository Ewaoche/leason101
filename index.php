<?php
   require_once './app/Dbconnection.php';
   $opert = new Operation();
  //  die(var_dump($opert));
  include 'includes/header.php';
  $opert->getForms();
 

?>
      <div class="container">  
          <div class="row">
            <div class="col-lg-6 m-auto" >
                <div class="card mt-3">
                   <div class="card-header text-center">
                    <h2>Register Here</h2>
                   </div>
                   <div class="card-body">

                       <form action="index.php" method="post">
                       <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="username" required>
                       </div>
                       <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="password" required>
                       </div>
                       <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="email" required>
                       </div>
                       <div class="form-group">
                        <input type="text" class="form-control" name="firstname" placeholder="firstname" required>
                       </div>
                       <div class="form-group">
                        <input type="text" class="form-control" name="lastname" placeholder="lastname" required>
                       </div>
                       <button class="btn btn-primary" name="signup_btn">Sign Up</button>
                       </form>
                   </div>
                </div>
            </div>
          </div> 
      </div>
      <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
     swal({
        title: "Good job!",
        text: "Your registration was submited successfully!",
        icon: "success",
        button: "Aww yiss!",
        });
    </script> -->
    