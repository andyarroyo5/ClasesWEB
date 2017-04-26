<?php
  if(!isset($_COOKIE['juegos']))
  {
    echo "no esta";
    setcookie("juegos",0, time()+600,rtrim(dirname($_SERVER['PHP_SELF']),'/').'/');
  }
  if(!isset($_COOKIE['usuario']))
  {
    echo "no esta 2";
    setcookie("usuario","",time()+2678400);
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    //Yo, Andrea Arroyo, declaro haber hecho este trabajo con estricto apego al Código de Honor de la UDEM
    session_start();
    ?>
  </head>
  <body>

    <h1>Tirada de Dados </h1>

    <?php


    if(@$_COOKIE['juegos']==10)
    {
      echo "<h3> Lo siento, sólo puedes jugar un máximo de 5 juegos por cada 10 min</h3>";

      exit();
    }

    $randomBool=1;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      print_r($_REQUEST);
      print_r($_POST);
      if(isset($_POST["guardar"]) && @$_POST["nombreUsuario"]=="" )
      {
        $randomBool=0;
        setcookie("usuario",$_POST["nombreUsuario"],time()+2678400);
        //$_COOKIE['usuario']=$_POST["nombreUsuario"];
      }

      if(isset($_POST["menos"]))
      {
        $randomBool=0;
          array_pop($_SESSION['dados']);
      }

      if(isset($_POST['mas']))
      {
        $randomBool=0;
          $random= rand(1,6);
          array_push($_SESSION['dados'],getUnicodeChar($random));
      }

      if(isset($_SESSION['dados']))
      lanzar(count($_SESSION['dados']),$randomBool);



    }
    else {
      lanzar(3,$randomBool);
    }


    function lanzar($dados,$randomBool)
    {

      echo "<div>";
      for ($i=0; $i <$dados; $i++) {
          if($randomBool==1)
          {
            $random= rand(1,6);
            $_SESSION['dados'][$i]= getUnicodeChar($random);
          }

          echo $_SESSION['dados'][$i];
      }

      echo "</div>";

      if(isset($_POST['lanzar']))
      {
        session_destroy();
        echo "<a href='".$_SERVER['PHP_SELF']. "'>Jugar de Nuevo</a>";
        @$_COOKIE['juegos']++;
      //  setcookie("juegos",$_COOKIE['juegos'],time()+2678400);
        echo "Has jugado ". $_COOKIE['juegos']. " veces";

        exit();
      }
    }

    function getUnicodeChar($numDado){

        switch ($numDado) {
            case 1:
              $dado="<h2 style='font-size: 100px;vertical-align: middle; display:inline;'>&#9856</h1>";
              break;

            case 2:
              $dado="<h2 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9857</h1>";
              break;

            case 3:
              $dado="<h2 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9858</h1>";
              break;
            case 4:
              $dado="<h2 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9859</h1>";
              break;
            case 5:
              $dado="<h2 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9860</h1>";
              break;
            case 6:
              $dado= "<h2 style='font-size: 100px;vertical-align: middle;display:inline;'>&#9861</h1>";
              break;

            default:
              break;
          }
          return $dado;
      }
     ?>

     <form class="" action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">
      <?php
       if(@$_COOKIE['usuario']=="")
       {
       ?>

       <span>Hola, si quieres personalizar el juego ingresa tu nombre</span>
       <br/>
       <input type="text" name="nombreUsuario" value="<?php @$usuarioNombre ?>" placeholder="Ingresa tu nombre">
       <input type="submit" name="guardar" value="Guardar " style="font-size:150%;">
       <br/>
       <?php
       }
       else
        {
           echo "<span>Hola". $_COOKIE['usuario']. " </span><br />";
        }
       ?>

       <span>Aumentar o disminuir número de dados</span>
       <br/>
       <input type="submit" name="menos" value="-" style="font-size:150%;"<?php if(isset($_SESSION['dados'])&& count($_SESSION['dados'])==1) echo 'disabled'; ?>>
       <input type="number" min="1" max="10" name="" style="font-size:150%; text-align: center;" value=<?php if(isset($_SESSION['dados'])) echo count($_SESSION['dados']);?> disabled>
       <input type="submit" name="mas" value="+" style="font-size:150%;" <?php if(isset($_SESSION['dados'])&& count($_SESSION['dados'])==10) echo 'disabled'; ?>>

       <input type="submit" name="lanzar" value="Lanzar Dados" style="font-size:150%;">

     </form>

  </body>
</html>
