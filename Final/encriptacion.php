<?php

$pass= crypt("andrea","12345");
echo $pass;
echo "<br>";
$pass2= crypt("andrea","irving");
echo $pass2;

if(hash_equals($pass,$pass2))
{

}

 ?>
