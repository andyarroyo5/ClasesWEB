<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php session_start(); ?>
    <script type="text/javascript">
    function abrirPagina (pagina) {
       window.location=pagina;
      }

    </script>
  </head>
  <body>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    //  print_r($_REQUEST);
      if($POST['zona']=='spedro')
        {
          $_SESSION["zona"]='San Pedro Garza';
        }
      else{
        $_SESSION["zona"]=$_POST["zona"];
      }    
    }

      if(!isset($_SESSION['tipo'])|| !isset($_SESSION['zona']) )
      {

          echo "<a href='paso1.php'>ERROR regresa al primer paso</a>";
          return;
      }

     ?>

    <h1>Búsqueda de vehículos</h1>

    <span>1. Tipo-- 2. Zona -- <b>3. Precio</b> </span>
    <h1>Paso 1: Elija el Tipo de vehículo</h1>
    <form method="POST" action="resultado.php">

      Precio:
      <input type="radio" name="precio" value="1" required checked="checked"> <$100,000
      <input type="radio" name="precio" value="2" > entre $100,000 y $300,000
      <input type="radio" name="precio" value="3" > >$300,000
        <br>
        <INPUT TYPE="BUTTON" VALUE="Anterior" ONCLICK="abrirPagina('paso2.php')">
        <input type="submit" name="busqueda" value="Finalizar">

    </form>

    <span>Buscando <i><?php echo $_SESSION['tipo']?> </i> en <i><?php echo $_SESSION['zona']; ?></i> </span>

  </body>
</html>
