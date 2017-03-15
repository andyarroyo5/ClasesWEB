
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>IVA</title>
  </head>
  <body>

    <?php
    /*Funciones,Errores, Librerias*/

    /*
    Crear una función que calcule el precio con IVA de un producto
    3 parámetros: valor, porcentaje IVA opcional default 16, total, precio +iva
    */
    function sinErrores ($numError, $strError)
    {
    echo "Se produjo el error $numError : $strError<BR>";
    }
    set_error_handler('sinErrores');

    function calcPrecio($valor, $total,$porcIVA=16)
    {
      $total=($valor*($porcIVA/100))+ $valor;
      return $total;
    }

    $ejPrecio=calcPrecio(20,0);
    $ejPrecio2=calcPrecio(20,0,15);

    echo " Precio 1  : ".$ejPrecio;
    echo "<BR>";
    echo " Precio 2  : ".$ejPrecio2;
    echo "<BR>";
    $cadena="Universidad de monterrey en Nuevo León";
    $res=explode(" ",$cadena);
    print_r($res);

    echo "<BR> <p> cadena, 2</p>";
    $cadena="Universidad de monterrey en Nuevo León";
    $res=explode(" ",$cadena,2);
    print_r($res);

    echo "<BR> <p> cadena, -2</p> partelo y no me pongas lo demás";
    $cadena="Universidad de monterrey en Nuevo León";
    $res=explode(" ",$cadena,-2);
    print_r($res);

    echo "<BR> <p>var dump</p>";
    var_dump($res);
    var_dump(trim($cadena));

    echo "<p>strcmp</p>";
    echo strcmp("hola","HOLA");
    echo "<p>strcmp</p> ";
    echo strpos($cadena," de");
    echo "<p>strpos</p>";
    echo strpos($cadena,"de",10);
    echo "<p>strrev</p> ";
    echo strrev($cadena);


    $fecha = date ('l d \o\f F \o\f Y, H:i');
    echo "<p>fecha</p> ";
    echo $fecha;
    ?>





  </body>
</html>
