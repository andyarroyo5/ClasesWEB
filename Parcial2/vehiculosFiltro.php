<!DOCTYPE html>
<html>
  <head>

    <script LANGUAGE=’JavaScript’>
    function actualizarPagina()
    {
      i = document.forms.miFormulario.miSelect.selectedIndex;
      tipo = document.forms.miFormulario.miSelect.options[i].value;
      window.location = <?php echo $_SERVER['PHP_SELF'] ?>'?tipo=' + tipo;
    }
    </script>


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

    <form name="formulario">
          <select name="tipo" onchange="actualizarPagina()">
            <option value="todos">Todos</option>
            <option value="auto">Auto</option>
            <option value="camioneta">Camioneta</option>
            <option value="motocicleta">Motocicleta</option>
            <option value="bicicleta">Bicicleta</option>
            <option value="otro">Otro</option>

        </select>
    </form>




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

      //require conexion.php se guardan estos datos
      $server="localhost";
      $user="root";
      $pass="";
      $bd="web";

      $conexion2=mysqli_connect($server,$user,$pass,$bd) or die("Error de conexion:".mysqli_connect_error());

      $query="SELECT * from vehiculos";


      //paginación
      if (isset($_REQUEST['begin']))
          $begin=$_REQUEST['begin'];
      else
      $begin=0;

      $n=3;
      $result=mysqli_query($conexion2,$query) or die("Error de consulta".mysqli_error());
      $numRows=mysqli_num_rows($result);

      for ($i=0; $i < $numRows; $i++) {
        # code...
        echo "<tr>";
        $tupla=mysqli_fetch_array($result,MYSQLI_ASSOC);
        foreach ($tupla as $key => $value) {

          switch ($key) {
            case 'tipo':
              $tipo=$value;
              break;
            case 'titulo':
              $titulo=$value;
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


              $tipo=$_REQUEST['tipo'];

              echo $tipo;

              if(isset($tipo))
                $selected=$tipo;
              else {
                $selected="Todos";
              }
              for ($i=0; $i < count($lista); $i++) {
                  $cad=trim($lista[$i], "'");
                  if ($cad==$selected)
                    echo "<OPTIOND VALUE='$cad' SELECTED>$cad\n";
                  else
                    echo "<OPTIOND VALUE='$cad'>$cad\n";
              }

              echo "</SELECTED></P>\n";
              echo  "</FORM>\n";

              //Enviar consulta
              $instruccion="SELECT * from vehiculos";
              if(isset($tipo) && tipo!="Todos")
                $instruccion=$instruccion+ "WHERE tipo='$tipo'";
              else
                $instruccion=$instruccion+ "order by fecha desc";


                $consulta=mysqli_query($conexion2,$instruccion) or die ("Fallo en la consulta");

                //Mostrar resultados de la consulta
                $nfilas=mysqli_num_rows($consulta);
                if ($nfilas>0)
                {
                  echo "<TABLE BORDER='1'>\n";
                }


       ?>


   </table>
  </body>
</html>
