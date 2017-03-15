<?php

$server="localhost";
$user="web";
$pass=12345;
$bd="web";

$conexion1=mysqli_connect($server,$user,$pass,$bd) or die("Error de conexion:".mysqli_connect_error());



echo "Conectado web";

$server="localhost";
$user="root";
$pass="";
$bd="web";

$conexion2=mysqli_connect($server,$user,$pass,$bd) or die("Error de conexion:".mysqli_connect_error());

echo "<br>Conectado root";

$query="SELECT * from vehiculos";
$result=mysqli_query($conexion1,$query) or die("Error de consulta".mysqli_error());
echo "<br>Query correcta<br>";
var_dump($result);

$numRows=mysqli_num_rows($result);

echo "<br> tuplas :".$numRows;

for ($i=0; $i <$numRows; $i++) {
  # code...
  $tupla=mysqli_fetch_array($result,MYSQLI_ASSOC);
//  $tupla=mysqli_fetch_array($result);
echo "<br>";
  print_r($tupla);
}

//sprint_r($array);
mysqli_close($conexion1);


 ?>
