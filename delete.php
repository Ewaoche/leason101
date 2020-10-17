<?php

if(isset($_GET['did']))
  {
      
    require_once './app/Dbconnection.php';
    $opert = new Operation();

    $id =  $_GET['did']; 
    $result = $opert->deleteUser($id);
    if($result){
      header("location:view.php");
    }

  }
  