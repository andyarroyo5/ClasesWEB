

<html>
<head>
  <p>
    Nosotros declaramos que hemos hecho este trabajo con estricto apego al código de Honor de la UDEM
    Carlos Martín del Campo #277211
    Sonia Andrea Arroyo Uribe #344956
  </p>
</head>
  <body>

<?php


    echo "<table style='width:30%'>";
    for ($i=0; $i <11 ; $i++) {
      echo "<tr>";
        if ($i==0)
        {
          echo"<td>";
            echo 'x';
          echo"</td>";
        }
        else {
          echo"<th>";
                echo $i;
          echo"</th>";
        }

      for ($j=1; $j <11 ; $j++) {
          if($i==0)
          {
            echo"<th>";
                  echo $j;
            echo"</th>";
          }
          else {
            echo"<td>";
                  echo $j*$i;
            echo"</td>";
          }
      }
      echo"</tr>";
    }
    echo "</table>";

    echo "<h1>Tabla de multiplicación del 1 al 10</h1>";
    echo "<table>";
    $resp = 0;
    for($i = 1; $i<11; $i++){
      echo "<tr>";
      echo "<td> 1 x $i =</td> <td> $i </td>";
      echo "</tr>";
    }
    echo "</table>";

    ?>

    </body>

</html>
