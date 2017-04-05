<?php
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');    // DB username
// define('DB_PASSWORD', '');    // DB password
// define('DB_DATABASE', 'web');      // DB name
// $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die( "Unable to connect");
// $database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");

$server="localhost";
$user="root";
$pass="";
$bd="web";

$conexion=mysqli_connect($server,$user,$pass,$bd) or die("Error de conexion:".mysqli_connect_error());
?>
