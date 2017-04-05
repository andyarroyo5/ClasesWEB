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
      $_SESSION["tipo"]=$_POST["tipo"];
    //  echo  " <span>Buscando <i>".  $_SESSION['tipo']. "</i></span>";
    }

    if(!isset($_SESSION['tipo']))
    {
        echo "<a href='paso1.php'>ERROR regresa al primer paso</a>";
        return;
    }


     ?>

    <h1>Búsqueda de vehículos</h1>

    <span>1. Tipo-- <b>2. Zona</b> -- 3. Precio </span>
    <h1>Paso 2: Elija la zona del vehículo</h1>
    <form method="POST" action="paso3.php">

        Zona:
        <select name="zona" onchange="actualizarPagina()">
          <option value="apodaca" <?php if(!isset($_SESSION['zona']) || $_SESSION['zona']== 'apodaca') echo 'selected';?>>Apodaca</option>
          <option value="guadalupe"<?php if($_SESSION['zona'] == 'guadalupe') echo 'selected';?>>Guadalupe</option>
          <option value="monterrey"<?php if($_SESSION['zona'] == 'monterrey') echo 'selected';?>>Monterrey</option>
          <option value="san pedro garza"<?php if($_SESSION['zona'] == 'spedro') echo 'selected';?>>San Pedro Garza</option>
        </select>

        <br>
          <span>Buscando <i><?php echo $_SESSION['tipo']; ?></i></span>
        <br>
        <br>

        <INPUT TYPE="BUTTON" VALUE="Anterior" ONCLICK="abrirPagina('paso1.php')">
        <input type="submit" name="busqueda" value="Siguiente">

    </form>



  </body>
</html>
