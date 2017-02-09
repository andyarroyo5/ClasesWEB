<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ejercicios Cadena </title>
  </head>
  <body>

    <?php
    function invertirArray($cadena)
    {
      echo implode ( " ",array_reverse(explode(" ",$cadena)));
    }

    $cadena="Universidad de Monterrey";
    invertirArray($cadena);
     ?>
  </body>
</html>
