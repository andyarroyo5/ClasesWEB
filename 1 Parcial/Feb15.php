<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>  </title>
  </head>
  <body>

    <?php
    /*

    Fecha y hora actual con el formato
    dia semana / dia num / mes / año / hora min

    Programa poner 10 fechas posteriores
    sumar 12 horas 12 min

    */
    date_default_timezone_set('America/Monterrey');

    echo "Fechas Ejemplo notas: <BR>";

    $f = date ("l d \of F \of Y, H:i");
    echo $f."<BR>";
    setlocale(LC_TIME,"es_MX.utf8");
    $f2=strftime("%A %d de %B de %G, %H:%M");
    echo $f2."<BR>";
    $time=strtotime("31 january 2017");
    $f3 = date ("j/n/Y",$time);
    echo $f3;


    echo "<BR> <BR>  Fechas Programa: <BR>  <BR>";
    $f = date ("l d \of F \of Y, g:i a");
  //  $datetime=new DateTime($f);
    echo $f."<BR>";


    echo "<BR> <BR> Fechas posteriores : <BR>  <BR>";


    for ($i=0; $i <10 ; $i++) {
      $futureDate = $currentDate+(60*732);
      $formatDate = date("l d \of F \of Y, g:i a", $futureDate);
      echo $formatDate."<BR>";
      $currentDate=$futureDate;
    }
    ?>

  </body>
</html>
