<?php
  $x = 3.1416;
  echo gettype($x)."<BR>";
  $y = 10;
  echo is_integer($y)."<BR>";
  $a = array("abc","123","hola");
  var_dump($y);
  echo "<BR>";
  var_dump($a);

  echo "<BR>";


  $s = "Hola";
  echo "El valor de s es $s ";
  echo 'El valor de s es $s ';

  $cad = "saludo";
  $$cad = "Hola";
  echo $cad."";
  echo $saludo."";
  echo "$saludo = ${$cad} ";

  echo "<BR>Variables dinámicas<BR>";
  $mensaje_es="hola";
  $mensaje_en="hello";
  $mensaje_deutsch="guten tag";
  $idioma = "deutsch";
  $mensaje = "mensaje_".$idioma;
  echo "$mensaje<BR>";
  echo $$mensaje;

  echo "<BR>Constantes<BR>";
  define (’PI’,3.1416,true);
  define ("saludo","Hola");
  if(defined("pi"))
  { echo pi.""; }
  echo saludo;

?>
