<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">

    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">

    #bar{
      background-color: <?php @$color ?>
    }

  </style>

  <body>

<?php
//|| $_GET('resultado')==1
if (($_SERVER["REQUEST_METHOD"] == "POST"))
{

  $server="localhost";
  $user="root";
  $pass="";
  $bd="web";
  $conexion=mysqli_connect($server,$user,$pass,$bd) or die("Error de conexion:".mysqli_connect_error());
  $query="SELECT * from partido";
  $result=mysqli_query($conexion,$query) or die("Error de consulta".mysqli_error());

  echo "<table>
        <tr>
          <th>Partido</th>
          <th>Votos</th>
          <th>Porcentage</th>
          <th>Gráfica</th>
        </tr>";

  $numRows=mysqli_num_rows($result);
  for ($i=0; $i < $numRows; $i++) {
    # code...
    $tupla=mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo "<tr>";
    $queryTotal="SELECT SUM(Voto) as VotoTotal from partido";
    $resultQuery=mysqli_query($conexion,$queryTotal) or die("Error de consulta".mysqli_error());
    $votosTotalResult = mysqli_fetch_array($resultQuery);
    $votosTotal=$votosTotalResult['VotoTotal'];

    foreach ($tupla as $key => $value) {

        switch ($key) {
          case 'Nombre':
          $partido=$value;
            break;
          case 'Voto':

              $voto=$value;
              if($_POST['opc']==$partido)
              {
                $voto++;
                $queryUpdate="UPDATE partido
                        SET Voto = ".$voto."
                        WHERE Nombre= '".$partido."'";

                $resultqueryInsertar=mysqli_query($conexion,$queryUpdate) or die("Error de consulta".mysqli_error());
              }

                $porciento=($voto/$votosTotal) *100;
                $_SESSION['porciento'][$partido]=number_format((float)$porciento, 2, '.', '');

              break;
          case 'Color':
              $color=$value;
              break;

          default:
            # code...
            break;
        }
      }

      echo "<td>". $partido."</td>";
      echo "<td>". $voto."</td>";
      echo "<td>".number_format((float)$porciento, 2, '.', '') ."%</td>";
      echo " <td> <div class='w3-light-grey'>
            <div class='w3-".$color."'style='height:24px;width:".$porciento."% ;'></div>
          </div></td>";
      //echo"<progress value='". number_format((float)$porciento, 2, '.', '')." ' max='100'></progress></td>";

    }

  echo" </table>";

  echo "Total de votos emitidos :". $votosTotal;

   echo "<br><a href='encuesta.php'>ver Resultado</a>";
   echo "<h1>Gráfica de las encuestas </h1>";

echo "<div>";

  /* echo count($_SESSION['porciento']);
    foreach ($_SESSION['porciento'] as $key => $value) {
      echo $key." votos: ". $value;
    
    } */  
      
   
    echo "<br>";
    $Randomized = rand(1,20); 
    //for($i=0;$i<=$Randomized;$i++){$data[$i]=\rand(2,20);};//full array with garbage. 
    $imgx='600';$imgy='400';//Set Image Size. ImageX,ImageY 
    $cx = '300';$cy ='150'; //Set Pie Postition. CenterX,CenterY 
    $sx = '300';$sy='300';$sz ='100';// Set Size-dimensions. SizeX,SizeY,SizeZ 
   // $data_sum = array_sum($data); 
    $im=imagecreatetruecolor(100,100);
    $color1 = imagecolorallocate($im,0,0,255); 
     imagefilledarc($im,$cx,$cy,$sx,$sy,0,.43, $color1, IMG_ARC_PIE); 
   
    imagestring($im, 10, 1,0, 'Hello world!', $color1); 
    //Output. 
    header('Content-type: image/png'); 
    imagepng($im); 
    imagedestroy($im); 

     return;
  }

?>


<h1>Votaciones</h1>
<div class="container" style="margin:0px;">

 <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">

<span>¿Porqué partido polìtico votará en las siguientes elecciones?</span> <br>
 <input type="radio" name="opc" value="PAN" checked="checked" required> PAN <br>
 <input type="radio" name="opc" value="PRI"> PRI <br>
 <input type="radio" name="opc" value="PRD"> PRD <br>
 <input type="radio" name="opc" value="MORENA"> MORENA <br>
 <input type="radio" name="opc" value="MOVIMIENTO CIUDADANO"> MOVIMIENTO CIUDADANO<br>
 <input type="radio" name="opc" value="Otro"> Otro <br>


 <input type="submit" name="Votar" value="Votar">
 <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">ver Resultado</a>

 </form>
</div>




  </body>
</html>
