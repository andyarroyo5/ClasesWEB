<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php session_start(); ?>
    <script LANGUAGE=’JavaScript’>

    function actualizarPagina()
    {
      i = document.forms.miFormulario.miSelect.selectedIndex;
      tipo = document.forms.miFormulario.miSelect.tipo[i].value;
      window.location = <?php echo $_SERVER['PHP_SELF'] ?>'?tipo=' + tipo;
    }
    </script>
  </head>
  <body>

    <?php




    ?>


    <h1>Búsqueda de vehículos</h1>

    <span><b>1. Tipo</b> -- 2. Zona -- 3. Precio </span>
    <br>

    <h1>Paso 1: Elija el Tipo de vehículo</h1>
    <br>
    <form method="POST" action="paso2.php">
      Tipo de vehículo:
      
        <select name="tipo" onchange="actualizarPagina()">
          <option value="auto" <?php if(!isset($_SESSION['tipo']) || $_SESSION['tipo']== 'auto') echo 'selected';?>>Auto</option>
          <option value="camioneta"  <?php if($_SESSION['tipo'] == 'camioneta') echo 'selected';?>>Camioneta</option>
          <option value="motocicleta" <?php if($_SESSION['tipo'] == 'motocicleta') echo 'selected';?>>Motocicleta</option>
        </select>
        <br>
        <input type="submit" name="busqueda" value="Siguiente">

    </form>

  </body>
</html>
