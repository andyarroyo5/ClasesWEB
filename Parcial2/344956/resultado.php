<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <script type="text/javascript">
  function abrirPagina (pagina) {
     window.location=pagina;
    }

  </script>
<?php
//require 'dbconfig.php' ;
session_start();
 ?>
  <body>

    <?php


    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    //  print_r($_REQUEST);
      $_SESSION["precio"]=$_POST["precio"];

      switch ($_POST["precio"]) {
        case '1':
        $PRECIO="precio<100000";
        $_SESSION["precio"]='<$100,000';
          break;
        case '2':
        $PRECIO="precio>100000 AND precio < 300000";
        $_SESSION["precio"]=' entre $100,000 y $300,000 ';
          break;
        case '3':
        $PRECIO='precio>300000';
        $_SESSION["precio"]='>$300000';
          break;

        default:
          # code...
          break;
      }

      if(!isset($_SESSION['tipo'])|| !isset($_SESSION['zona'])|| !isset($_SESSION['precio']) )
      {

          echo "<a href='paso1.php'>ERROR regresa al primer paso</a>";
          return;
      }


    }
     ?>

     <span>Buscando <i><?php echo $_SESSION['tipo']?> </i> en <i><?php echo $_SESSION['zona']; ?></i> con precio <i><?php echo $_SESSION['precio']; ?></i></span>



       <?php

       $server="localhost";
       $user="root";
       $pass="";
       $bd="web";

       $conexion=mysqli_connect($server,$user,$pass,$bd) or die("Error de conexion:".mysqli_connect_error());


       $TIPO=$_SESSION['tipo'];
       $ZONA=$_SESSION['zona'];

       $query="SELECT * from vehiculos WHERE tipo='$TIPO' AND zona= '$ZONA' AND $PRECIO";
      // echo "<br>". $query;
       $result=mysqli_query($conexion,$query) or die("Error de consulta".mysqli_error($conexion));
       $numRows=mysqli_num_rows($result);

       if( $numRows>0)
       {

         echo "   <table>
               <tr>
                 <th>Tipo</th>
                 <th>Zona</th>
                 <th>Título</th>
                 <th>Descripción</th>
                 <th>Precio</th>
                 <th>Foto</th>
               </tr>";

                for ($i=0; $i < $numRows; $i++) {
                  # code...
                  echo "<tr>";
                  $tupla=mysqli_fetch_array($result,MYSQLI_ASSOC);
                  foreach ($tupla as $key => $value) {

                    switch ($key) {
                      case 'tipo':
                        $tipo=$value;
                        break;
                      case 'zona':
                        $zona=$value;
                        break;
                      case 'titulo':
                         $titulo=$value;
                        break;
                      case 'descripcion':
                          $descripcion=$value;
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

                  echo "<td>".$tipo."</td>";
                  echo "<td>".$zona."</td>";
                  echo "<td>".$titulo."</td>";
                  echo "<td>".$descripcion."</td>";
                  echo "<td> $".$precio."</td>";
                  echo "<td>".$foto."</td>";


                  echo "</tr>";

                }
       }
       else {
         echo "   <br><br> No se encontro un vehículo con esa descripción";
       }

       session_destroy();

      ?>
      <br>
      <INPUT TYPE="button" VALUE="Hacer otra búsqueda" ONCLICK="abrirPagina('paso1.php')">




  </body>
</html>
