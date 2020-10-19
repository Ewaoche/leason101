

<?php 
require_once('./app/Operation.php');

class DbConnection {

   public  $conn;


   public function __construct()
   {
       $this->connect();
   }

    public function connect()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'leason101db');
        return $this->conn;
        
    }

    public function clean($data)
    {
      $clean =  mysqli_real_escape_string($this->conn, $data);
    }
}

