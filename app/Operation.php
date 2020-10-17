<?php

  $dbconn = new DbConnection();

class Operation extends DbConnection{

    public function getForms(){
      global $dbconn;

        if(isset($_POST['signup_btn']) ){
            $firstname = $dbconn->clean($_POST['firstname']);
            $lastname = $dbconn->clean($_POST['lastname']);
            $password = $_POST['password'];
            $email = $_POST['email'];
            $username = $_POST['username'];
          $this->insert($username, $password, $email,  $firstname, $lastname);

        }


    }
    public function insert($username, $password, $email,  $firstname, $lastname){
      //  $conn = mysqli_connect('localhost', 'root', '', 'leason101db');
       $stmt = "INSERT INTO users(username, password, email,  firstname, lastname)
       VALUES('$username', '$password', '$email',  '$firstname', '$lastname')";
       $query = mysqli_query($this->conn, $stmt);
    }

    public function getAllUser(){
      $getAllUser = mysqli_query($this->conn, "SELECT * FROM users");
      return $getAllUser;
    }

    public function getUser($id){
      $getUser = mysqli_query($this->conn, "SELECT * FROM users WHERE id='$id'");
      $getUser = mysqli_fetch_object($getUser);
      return $getUser;
    }

    public function runUpdate(){
      if(isset($_POST['update_btn']) ){
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $UpdateUser = mysqli_query($this->conn, "UPDATE users SET username='$username', password='$password', email='$email', firstname='$firstname', lastname='$lastname' WHERE id='$id'");
        return  $UpdateUser;

    }

    }

    public function deleteUser($id){
      $deleteUser = mysqli_query($this->conn, "DELETE FROM users  WHERE id='$id'");
      return $deleteUser;
    }

}