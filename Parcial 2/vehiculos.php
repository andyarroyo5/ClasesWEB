<!DOCTYPE html>
<html>
  <head>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;
    }
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


  <?php

   ?>

   <table>
      <tr>
        <th>Titulo</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Fecha</th>
        <th>Imagen</th>
      </tr>
      <?php
      $server="localhost";
      $user="root";
      $pass="";
      $bd="web";

      $conexion2=mysqli_connect($server,$user,$pass,$bd) or die("Error de conexion:".mysqli_connect_error());

      $query="SELECT * from vehiculos";
      $result=mysqli_query($conexion2,$query) or die("Error de consulta".mysqli_error());

      $numRows=mysqli_num_rows($result);

      for ($i=0; $i < $numRows; $i++) {
        # code...
        echo "<tr>";
        $tupla=mysqli_fetch_array($result,MYSQLI_ASSOC);
        foreach ($tupla as $key => $value) {

          switch ($key) {
            case 'tipo':
              $titulo=$value;
              break;
            case 'titulo':
              $tipo=$value;
              break;
              case 'descripcion':
                $descripcion=$value;
                break;
            case 'fecha':

              $fechavieja=Date_create($value);
              $fecha=Date_format($fechavieja,"d/M/Y");
              //$fecha=date("d/M/Y")
              //http://www.plus2net.com/php_tutorial/php_date_format.php
            break;
            case 'precio':
            $precio=number_format((float)$value, 2, '.', ',');
            break;
            case 'foto':
              $foto= "<a href='fotos/". $value ."'>$value</a>";
            break;
            default:
              break;
          }
        }

        echo "<td>".$titulo."</td>";
        echo "<td>".$tipo."</td>";
        echo "<td>".$descripcion."</td>";
        echo "<td> $".$precio."</td>";
        echo "<td>".$fecha."</td>";
        echo "<td>".$foto."</td>";


        echo "</tr>";

      }



       ?>


   </table>
  </body>
</html>
