<?php
session_start();

$dbconn = new DbConnection();

class Operation extends DbConnection{

    public function getForms(){
      global $dbconn;

        if(isset($_POST['signup_btn']))
        {
            $firstname = $dbconn->clean($_POST['firstname']);
            $lastname = $dbconn->clean($_POST['lastname']);
            $password = $_POST['password'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $inserted = $this->insert($username, $password, $email,  $firstname, $lastname);
           if($inserted)
           {
            $this->setMessage('<div class="alert alert-success">User Data Added Successfully</div>');
            header("location:view.php");
           }
           else
           $this->setMessage('<div class="alert alert-success">User Data not Added Successfully</div>');


        }


    }
    public function insert($username, $password, $email,  $firstname, $lastname)
    {
      //  $conn = mysqli_connect('localhost', 'root', '', 'leason101db');
       $stmt = "INSERT INTO users(username, password, email,  firstname, lastname)
       VALUES('$username', '$password', '$email',  '$firstname', '$lastname')";
       $query = mysqli_query($this->conn, $stmt);

       if($query) return true;

       else return false;
    }

    public function getAllUser()
    {
      $getAllUser = mysqli_query($this->conn, "SELECT * FROM users");
      return $getAllUser;
    }

    public function getUser($id)
    {
      $getUser = mysqli_query($this->conn, "SELECT * FROM users WHERE id='$id'");
      $getUser = mysqli_fetch_object($getUser);
      return $getUser;
    }

    public function runUpdate()
    {
      if(isset($_POST['update_btn']) )
      {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        // $UpdateUser = mysqli_query($this->conn, "UPDATE users SET username='$username', password='$password', email='$email', firstname='$firstname', lastname='$lastname' WHERE id='$id'");
        // return  $UpdateUser;
         $update = $this->update($id,$firstname,$lastname,$password, $email, $username);
         if($update)
         {
          $this->setMessage('<div class="alert alert-success">User Data Updated Successfully</div>');
           header("location:view.php");
         }
         else
        
         $this->setMessage('<div class="alert alert-success">User Data was not Updated Successfully</div>');

    }

    }

    public function update($id,$firstname,$lastname,$password, $email, $username)
    {
      $UpdateUser = mysqli_query($this->conn, "UPDATE users SET username='$username', password='$password', email='$email', firstname='$firstname', lastname='$lastname' WHERE id='$id'");
      
      if($UpdateUser)  return true;
     
      else  return false;
   
    }

    public function deleteUser($id)
    {
      $deleteUser = mysqli_query($this->conn, "DELETE FROM users  WHERE id='$id'");
      if($deleteUser)
      {
        $this->setMessage('<div class="alert alert-danger">User Data Deleted Successfully</div>');
        header("location:view.php");
      }
      else
      $this->setMessage('<div class="alert alert-danger">User Data not Deleted Successfully</div>');

    }

    //set session message
    public function setMessage($message)
    {
      if(! empty($message))

        $_SESSION['Message'] = $message;

      else
        $message = "";
      
    }

    // display session message
    public function showMessage()
    {
      if(isset($_SESSION['Message']))
      {
        echo $_SESSION['Message'];
        unset($_SESSION['Message']);
      }
    }

}