<?php
namespace App\model;
use PDO;
use PDOException;
include_once __DIR__ . '../../config/config.php';

class database{
   private $servername = DBHOST;
   private $username= DBUSER;
   private $password= DBPASS;
   private $databasename= DBNAME;
   protected $conn = null;

   function connection_database(){
    try{
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->databasename",
                         $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);   
    }catch(PDOException $e){   
        throw $e;
    }
    return $conn;
    }
}


?>