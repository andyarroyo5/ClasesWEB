<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <?php session_start(); ?>
    <script type="text/javascript">
    /*$(document).ready(function () {

      $("#cambioDados").change(
           function () {
               alert('cambio');
           }
       );
  });*/

      function actualizarPagina () {
         window.location = <?php echo $_SERVER['PHP_SELF'] ?>;
      }


      /*
      $('#cambioDados').on('change', function() {
           alert('cambio');
      });*/

    </script>
  </head>
  <body>

    <h1>Juego Dados </h1>

    <?php


    if(isset($_SESSION['dados']))
    {
      print_r($_REQUEST);
      print_r($_SESSION['dados']); 
      getDados($numDados,$prevDados);
    }
    else {
      $numDados=2;
      $prevDados=0;
      getDados($numDados,$prevDados);

    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {


      print_r($_REQUEST);
      echo "<br/>";
      $numDados=$_POST['numDados'];
      getDados($numDados,$prevDados);


    }
    else {
      $prevDados=0;
      $numDados=2;
      getDados($numDados,$prevDados);

    }

    function getDados($numDados,$prevDados){

      for ($i=0; $i <$numDados ; $i++) {
        if($i<$prevDados)
        {
          echo   $_SESSION['dados'][$i];
        }
        else {
          #   $random= rand(1,6);
            $_SESSION['dados'][$i]= getUnicodeChar($random);
        }
      }
      $prevDados=$numDados;
    }

    function getUnicodeChar($dado){

      switch ($dado) {
        case 1:
            echo "  <h1 style='font-size: 100px;vertical-align: middle; display:inline;'>&#9856</h1>";
          break;

        case 2:
            echo "  <h1 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9857</h1>";
          break;

        case 3:
            echo "  <h1 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9858</h1>";
          break;
        case 4:
            echo "  <h1 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9859</h1>";
          break;
        case 5:
          echo "  <h1 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9860</h1>";
          break;
        case 6:
          echo "  <h1 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9861</h1>";
          break;

        default:
          break;
      }

    }

    ?>
    <br>
    <span>Agregar Dado</span>
    <form  action= <?php echo $_SERVER['PHP_SELF'] ?> method="post">
      <input id="cambioDados" type="number" min="2" max="7" name="numDados" value=<?php echo $numDados;?>>
      <input TYPE="submit" VALUE="cambiar" onclick="cambio()">
      <input TYPE="submit" VALUE="Jugar" onclick="actualizarPagina()">

    </form>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
