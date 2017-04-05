<?php
//require 'dbconfig.php';
class User {
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "LogIn";
    private $userTbl    = 'Users';

    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }


    function checkuser($userData = array()){

    //this->db al parecer manera más segura de definir bd 
     //$check = mysql_query("SELECT * from Users where Fuid='". $userData['oauth_uid']. "'");

     $check = "SELECT * from Users where Fuid='". $userData['oauth_uid']. "'";
     $check = $this->db->query($check);
     //if (empty($check)) { // if new user . Insert a new record
     echo $check->num_rows;
     if ($check->num_rows ==0) { // if new user . Insert a new record

       $query = "INSERT INTO Users (Fuid,Ffname,Femail) VALUES ('". $userData['oauth_uid']. "','".$userData['first_name']. "','".$userData['email']. "')";
       //$result=mysql_query($query);
       $insert = $this->db->query($query);
       echo "Insert".$insert;
       } else {   // If Returned user . update the user record
       $query = "UPDATE Users SET Ffname='".$userData['first_name']."', Femail='".$userData['email']."' where Fuid='". $userData['oauth_uid']. "'";
       $update = $this->db->query($query);
       echo "Update". $update;
       //$result=mysql_query($query);
       }

      // print_r($userData);

        return $userData;
    }
}
?>
